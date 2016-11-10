<template>
    <div>
        <h3>{{student.name}}({{student.sid}})的成绩单</h3>
        <h5>绩点：{{gpa}}</h5>
        <ul class="list-group"  v-for="d in student.scores">
            <li class="list-group-item">{{d.subject}}：{{d.score}}</li>
        </ul>
    </div>
</template>
<style scoped>
</style>
<script>
//...请求拿到该学生的成绩表/002
var fakeScores={
    sid:'20135612',name:'张君卓',
    scores:[
        {subject:'编译原理',score:95},
        {subject:'操作系统',score:85}
    ]
}
//请求拿到该学生的绩点
var fakseGpa=4.5
    export default{
        data(){
            return{
                student:fakeScores,
                gpa:fakseGpa
            }
        },
        components:{

        }
    }
</script>
