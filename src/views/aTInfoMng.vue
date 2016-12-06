<style scoped>

</style>
<template>
    <div>
        <table class="table table-hover">
            <caption>教师信息管理</caption>
            <thead>
            <tr>
                <th>姓名</th>
                <th>性别</th>
                <th>生日</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            <button class="btn btn-success" @click="add" data-toggle="modal" data-target="#myModal">添加教师</button>
            <tr v-for="t in teachers"   >
                <td>{{t.realname}}</td>
                <td>{{t.sex}}</td>
                <td>{{t.birth}}</td>
                <td>
                    <button class="btn btn-danger" data-toggle="modal" data-target="#deleteModal" @click="getDeleteNum($index)">删除</button>
                    <button class="btn btn-success" data-toggle="modal" data-target="#myModal" @click="detail($index)">详情</button>
                </td>
            </tr>
            </tbody>
        </table>
<!--detail-->
        <div class="modal fade" id="myModal" v-if="isModal"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title" id="myModalLabel">编辑教师详情</h4>
                    </div>
                    <div class="modal-body">
                        <form role="form">
                            <div class="form-group">
                                <label>姓名</label>
                                <input type="text" class="form-control" v-model="selectTeacher.realname" placeholder="文本输入">
                                <label>性别</label>
                                <input type="text" class="form-control" v-model="selectTeacher.sex" placeholder="文本输入">
                                <label>生日</label>
                                <input type="text" class="form-control" v-model="selectTeacher.birth" placeholder="文本输入">
                                <label>学历</label>
                                <input type="text" class="form-control" v-model="selectTeacher.education" placeholder="文本输入">
                                <label>籍贯</label>
                                <input type="text" class="form-control" v-model="selectTeacher.hometown" placeholder="文本输入">
                                <label>班级</label>
                                <input type="text" class="form-control" v-model="selectTeacher.classes" placeholder="请用逗号隔开">
                            </div>
                        </form>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                        <button type="button" class="btn btn-primary" @click="update">提交更改</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>
<!--delete-->
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title" id="myModalLabel">删除提醒</h4>
                    </div>
                    <div class="modal-body">是否删除</div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                        <button type="button" class="btn btn-primary" @click="deleteIt">删除</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>
    </div>
</template>

<script>
import mainajax from '../request/mainajax.js'
    export default{

        data(){
            return {
                isModal:false,deleteNum:null,
                teachers:[],
                selectTeacher:{}
            }

        },
        components:{

        },
        methods:{
            add(){
                this.selectTeacher={}
                this.isModal=true
            },
            detail(index){
                this.isModal=false
                this.selectTeacher=this.teachers[index]
                this.isModal=true
            },
            getDeleteNum(index){this.deleteNum=index},
            deleteIt(){
                var _self=this
                var deleteId=this.teachers[this.deleteNum].id
                if(_self.deleteNum>-1){
                    //请求删除把id传入
                }
            },
            update(){
                var obj=this.selectTeacher
                obj.chose='addTeacher'
                console.log(obj)
                mainajax.methods.getObj(obj,'admin/teacher.php',function(data){
                    console.log('插入成功')
                })
            }
        },
        ready(){
        //请求得到teachers
        var _self=this
        var obj={}
        obj.chose="allTeachers"
        mainajax.methods.getObj(obj,'admin/teacher.php',function(data){
            _self.teachers=data
        })
        }
    }
</script>
