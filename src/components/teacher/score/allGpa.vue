<template>
    <div>
        <table class="table">
            <thead>
            <tr>
                <th>姓名</th>
                <th>学号</th>
                <th>绩点</th>
                <th>不及格率</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="y in loopobj" @click="showDetail($index)"  data-toggle="modal" data-target="#myModal">
                <td>{{y.name}}</td>
                <td>{{y.sid}}</td>
                <td>{{y.gpa}}</td>
                <td>{{y.rapid}}%</td>
            </tr>
            </tbody>
        </table>
        <gpa-detail v-if="gpaD" :stud_detail.sync="studD"></gpa-detail>
    </div>
</template>
<style scoped>
    tr{cursor: pointer}
</style>
<script>
    import gpaD from './gpaDetailModal.vue'
    export default{
        data(){
            return{
                gpaD:false,studD:{},
                loopobj:[
                    {name:'张三',sid:'20135612',gpa:4.2,rapid:0.0},
                    {name:'张三',sid:'20135614',gpa:4.2,rapid:0.0},
                    {name:'张三',sid:'20135616',gpa:4.2,rapid:0.0}
                ]
            }
        },
        methods:{
            showDetail(index){
                this.gpaD=true
                var tsid=this.loopobj[index].sid//获取当前学生的学号
                //.....请求学生的成绩单002
                var fakeScoreList={
                    name:'张三',sid:'20145155',scores:[
                        {subject:'编译原理',score:88},
                        {subject:'操作系统',score:90}
                    ]
                }
                this.studD=fakeScoreList
            }
        },
        components:{
            'gpa-detail':gpaD
        }
    }
</script>
