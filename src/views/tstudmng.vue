<style scoped>
    select{width:20%}
    tr{cursor: pointer}
</style>
<template>
    <div>
        <div class="form-group">
            <div>
                <label for="ssubject">选择班级</label>
                <select class="form-control"  v-model="selected" @change="showStud(selected)" id="ssubject">
                    <option v-for="c in classes" >{{c}}</option>
                </select>
            </div>
            <table class="table" v-if="studList">
                <thead>
                <tr>
                    <th>姓名</th>
                    <th>学号</th>
                    <th>性别</th>
                    <th>籍贯</th>
                    <th>生日</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="y in students" data-toggle="modal" data-target="#myModal" @click="showStudInfo($index)">
                    <td>{{y.name}}</td>
                    <td>{{y.sid}}</td>
                    <td>{{y.sex}}</td>
                    <td>{{y.identify}}</td>
                    <td>{{y.birth}}</td>
                </tr>
                </tbody>
            </table>

        </div>
        <stdu-info-detail :stud_detail.sync="stud_detail" v-if="showD"></stdu-info-detail>

    </div>
</template>
<script>
    import studInfoDetail from '../components/teacher/studInfo/studInfoModal.vue'
    //。。。请求拿到教学的班级
    var fakeClasses=['计算机1班','计算机2班','计算机3班','计算机4班']

    export default{
        data(){
            return{
                studList:false,showD:false,
                selected:'',
                classes:fakeClasses,
                students:[],stud_detail:{}
            }
        },
        methods:{
            showStud(selectedClass){
                this.studList=true
                //。。。请求拿到教学班级的学生004
                var fakeStuds=[
                    {sid:20135612,name:'张君卓',sex:'女',identify:'120104199501207666',birth:'1995-01-21',hometown:'西藏',department:'计算机学院',major:'计算机科学与技术',sclass:'1'},
                    {sid:20135612,name:'张三',sex:'女',identify:'120104199501207666',birth:'1995-01-21',hometown:'西藏',department:'计算机学院',major:'计算机科学与技术',sclass:'1'},
                    {sid:20135612,name:'李四',sex:'女',identify:'120104199501207666',birth:'1995-01-21',hometown:'西藏',department:'计算机学院',major:'网络工程',sclass:'2'},
                ]
                this.students=fakeStuds
            },
            showStudInfo(index){
                this.stud_detail=this.students[index]
                this.showD=true
            }
        },
        components:{
            'stdu-info-detail':studInfoDetail
        }
    }
</script>
