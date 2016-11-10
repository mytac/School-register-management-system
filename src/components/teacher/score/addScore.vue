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
                        <option v-for="s in subjects" >{{s.subject}}</option>
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
<!--        <table class="table table-hover">
            <caption>学科成绩</caption>
            <thead>
            <tr>
                <th>学号</th>
                <th>姓名</th>
                <th>成绩</th>
            </tr>
            </thead>
            <tbody>
            <tr>

            </tr>
            </tbody>
        </table>-->
    </div>
</template>

<script>
    //请求该教师教授的科目和班级
    var fakeSubject = [
        {subject:'编译原理',classes:['计算机1班','计算机2班']},
        {subject:'数据库',classes:['网工1班','网工2班']}
    ]

    export default{
        data(){
            return{
                classes:false,scorelist:false,
                selectClass:'', selected:'',tempScore:null,
                subjects:fakeSubject,
                sclasses:[],slist:[]
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
                var classes=[]
                this.subjects.forEach(function (s) {
                    if(s.subject==selected){classes=s.classes;}
                })
                this.sclasses=classes
                this.show('classes')
            },
            showScoreList(selectSubject,selectClass){
                //请求学生的成绩表
                   var fakeslist=[
                        {name:'张三',sid:'20135612',score:65},
                        {name:'lisi',sid:'20135612',score:65},
                        {name:'王五',sid:'20135612',score:65},
                        {name:'赵四',sid:'20135612',score:65}
                    ]
                this.slist=fakeslist
                console.log(this.slist)
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
                console.log('拿到的成绩'+this.tempScore)//拿到的成绩
            }
        },
        components:{

        }
    }
</script>
