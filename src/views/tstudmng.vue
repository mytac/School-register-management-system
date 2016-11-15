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
                    <td>{{y.id}}</td>
                    <td>{{y.sex}}</td>
                    <td>{{y.hometown}}</td>
                    <td>{{y.birth}}</td>
                </tr>
                </tbody>
            </table>

        </div>
        <stdu-info-detail :stud_detail.sync="stud_detail" v-if="showD"></stdu-info-detail>

    </div>
</template>
<script>
    import mainajax from '../request/mainajax.js'
    import studInfoDetail from '../components/teacher/studInfo/studInfoModal.vue'

    export default{
        data(){
            return{
                studList:false,showD:false,
                selected:'',
                classes:[],
                students:[],stud_detail:{}
            }
        },
        methods:{
            showStud(selectedClass){
                var _self=this
                this.studList=true
                //得到学生列表
                var obj={}
                obj.chose="studentClassList"
                obj.class_id=selectedClass
                mainajax.methods.getObj(obj,'teacher/studentInfo.php',function(data) {
                    console.log(data)
                    _self.students=data
                })
            },
            showStudInfo(index){
                this.stud_detail=this.students[index]
                this.showD=true
            }
        },
        components:{
            'stdu-info-detail':studInfoDetail
        },
        ready(){
        var _self=this
        var teacher=JSON.parse(this.$route.params.teacherInfo)
        teacher.chose="teacherInfo"
        mainajax.methods.getObj(teacher,'teacher/studentInfo.php',function(data){
            var str=data[0]
            var arr=str.split(',')
            _self.classes=arr
        })
    }
}
 
</script>
