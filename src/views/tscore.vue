<template>
    <div>
        <div class="btn-toolbar list-toolbar">
            <button class="btn btn-primary" @click="showAdd()" v-show="!back">
                <i class="fa fa-plus"></i>录入成绩</button>
            <button class="btn btn-primary"  v-show="back" @click="goBack()">《返回</button>
            <div class="btn-group">
            </div>
        </div>
        <all-gpa v-show="!add" :scorelist.sync="scoreList"></all-gpa>
        <add-score  :teachsubjects.sync="subject" v-show="add"></add-score>
    </div>
</template>
<style scoped>

</style>
<script>
import mainajax from '../request/mainajax.js'
import addScore from '../components/teacher/score/addScore.vue'
import allGpa from '../components/teacher/score/allGpa'
    export default{
        data(){
            return{
                add:false,back:false,
                scoreList:[],subject:[]

            }
        },
        components:{
            'add-score':addScore,
            'all-gpa':allGpa
        },
        methods:{
            showAdd(){
                this.add=true;this.back=true
                var _self=this
                var student=this.scoreList[0].scores//array
                student.forEach(function(a){
                    _self.subject.push(a.subject)
                })
            },
            goBack(){this.add=false;this.back=false}
        },
        ready(){//得到该教师所教班级下的学生的成绩单
        var _self=this
        var teacher=JSON.parse(this.$route.params.teacherInfo)
        teacher.chose="teacherInfo"
        mainajax.methods.getObj(teacher,'teacher/studentInfo.php',function(data){
        var str=data[0]
        var arr=str.split(',')//取得class_id的数组【1,2,3】
        var obj={}
        //var wholeArray=[]
        obj.chose="average"
        /*这块遍历总是不对，暂定只能放一个班级*/
        /*这块遍历总是不对，暂定只能放一个班级*/
        /*这块遍历总是不对，暂定只能放一个班级*/
        /*这块遍历总是不对，暂定只能放一个班级*/
            arr.forEach(function(a){//////////1
                obj.class_id=a
                 var total=0
                 var classArray=[]
                 var m=[]
                var m=mainajax.methods.getReturn('teacher/studentInfo.php',obj)
                ///m--get
                m.forEach(function(student){///////2
                    if(student){
                        var arr=[]
                        var total=0
                        for(var i in student){
                            if(i.length==1){delete student[i]}
                            else if(/^[\u4e00-\u9fa5]+$/i.test(i)){
                                arr.push(parseInt(student[i]))
                            }
                        }
                        arr.forEach(function(score){total+=score})
                        student.average=total/(arr.length)
                        total=0
                        if(student!=null){classArray.push(student)}
                    }
                })
                _self.scoreList=classArray
            })
        },true)
        }
    }
</script>
