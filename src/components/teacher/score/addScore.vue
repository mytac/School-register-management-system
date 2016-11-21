<style scoped>
    .form-group>div{float: left;width: 50%;}
    select{width: 50%;}
    .slist{width: 100%;padding-top: 100px;}
    td {width: 25%}
    input{width:20%}
    .compelete{display: none}
</style>

<template>
    <div>
            <div class="form-group">
                <div>
                    <label for="ssubject">选择科目</label>
                    <select class="form-control"  v-model="selected" @change="showClasses(selected)" id="ssubject">
                        <option v-for="s in teachsubjects" >{{s}}</option>
                    </select>
                </div>
                <div  v-if="classes">
                    <label for="ssclass">选择班级</label>
                    <select class="form-control"  v-model="selectClass" id="ssclass" @change="showScoreList(selected,selectClass)">
                        <option v-for="c in sclasses" track-by="$index">{{c}}</option>
                    </select>
                </div>
            </div>

            <div class="form-group slist" v-if="scorelist">
                <table class="table table-striped">
                    <caption>{{selectClass}}的{{selected}}成绩表</caption>
                    <thead>
                    <tr>
                        <th>学号</th>
                        <th>姓名</th>
                        <th>成绩</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody >
                    <tr v-for="s in slist">
                        <td>{{s.stud_id}}</td>
                        <td>{{s.stud_name}}</td>
                        <td><input type="text" v-model="s.score" disabled @change="getTempScore(s.score)"></td>
                        <td>
                            <button class="btn btn-sm btn-danger modify" @click="changeDisableSingle($index)">修改</button>
                            <button class="btn btn-sm btn-success compelete" @click="compeleteSingle($index)">完成</button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
    </div>
</template>

<script>
    import mainajax from '../../../request/mainajax.js'
    export default{
        data(){
            return{
                classes:false,scorelist:false,
                selectClass:'', selected:'',getScore:null,
                sclasses:[],slist:[]
            }
        },
        props:{
            teachsubjects:{
                twoWay:true,
                type:Array
            }
        },
        methods:{
            show(str){
                eval('this.'+str+'=true')
            },
            toggled(hide1,show1,index,dis){
                var node=$("tbody").find("input").eq(index)
                $("tbody").find(hide1).eq(index).hide()
                $("tbody").find(show1).eq(index).show()
                if(dis==false){node.removeAttr("disabled")}
                else{node.attr("disabled",true)}
            },
            showClasses(selected){
                var _self=this
                var obj={}
                obj.chose="showClass"
                obj.subject_name=selected
                mainajax.methods.getObj(obj,'teacher/studentInfo.php',function(data){
                    var arr=data[0].split(',')
                    _self.sclasses=arr
                })
                this.show('classes')
            },
            showScoreList(selectSubject,selectClass){
                    var _self=this
                    var obj={}
                    obj.subject_name=selectSubject
                    obj.class_id=selectClass
                    obj.chose="subjectScoreList"
                    mainajax.methods.getObj(obj,'teacher/studentInfo.php',function(data){

                        data.forEach(function(obj){
                            for(var i in obj){
                                if(i.isNaN){delete obj[i]}

                                else if(/^[\u4e00-\u9fa5]+$/i.test(i)){
                                    obj.score=obj[i]
                                }
                            }
                        })
                        _self.slist=data
                    })
                this.show('scorelist')
            },
            changeDisableSingle(index){
                this.toggled('.modify','.compelete',index,false)
            },
            compeleteSingle(index){
                var _self=this
                var obj={}
                obj.chose="scoreModify"
                obj.score=_self.getScore
                obj.subject=_self.selected
                obj.studId=_self.slist[index].stud_id
                if(_self.getScore){
                    mainajax.methods.getObj(obj,'teacher/studentInfo.php',function(data){
                   alert(data)
                   _self.getScore=null
                })
                }
                this.toggled('.compelete','.modify',index,true)
            },
            getTempScore(score){
                this.getScore=score
                console.log('拿到的成绩'+this.getScore)//拿到的成绩
            }
        },
        components:{

        }
    }
</script>
