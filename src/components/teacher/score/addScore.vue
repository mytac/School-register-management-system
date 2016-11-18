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
                        <option v-for="c in sclasses" track-by="$index">{{c}}班</option>
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
                        <td>{{s.sid}}</td>
                        <td>{{s.name}}</td>
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
                selectClass:'', selected:'',tempScore:null,
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
                //请求学生的成绩表
/*                   var fakeslist=[
                        {name:'张三',sid:'20135612',score:65},
                        {name:'lisi',sid:'20135612',score:65},
                        {name:'王五',sid:'20135612',score:65},
                        {name:'赵四',sid:'20135612',score:65}
                    ]*/
                    var obj={}
                    obj.subject_name=selectSubject
                    obj.class_id=selectClass
                    obj.chose="subjectScoreList"
                    console.log(obj)
                    mainajax.methods.getObj(obj,'teacher/studentInfo.php',function(data){
                        console.log(data)
                    })
                //his.slist=fakeslist
                //console.log(this.slist)
                this.show('scorelist')
            },
            changeDisableSingle(index){
                this.toggled('.modify','.compelete',index,false)
            },
            compeleteSingle(index){
                this.toggled('.compelete','.modify',index,true)
                //。。。。。请求：修改数据--修改后的成绩为this.tempScore
            },
            getTempScore(score){
                this.tempScore=score
                //console.log('拿到的成绩'+this.tempScore)//拿到的成绩
            }
        },
        components:{

        }
    }
</script>
