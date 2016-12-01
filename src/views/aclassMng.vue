<style scoped>
button.tac{display: block;margin-bottom: 10px;}
tr{cursor:pointer;}
</style>
<template>
    <div>
        <button class="btn btn-success tac"  data-toggle="modal" data-target="#myModal">添加课程</button>
        <table class="table table-hover">
            <thead>
            <tr>
                <th>名称</th>
                <th>学分</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="c in classes">
                <td>{{c.subject_name}}</td>
                <td>{{c.degree}}</td>
                <td>
                    <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal" @click="deleteIt($index)">删除</button>
                    <button class="btn btn-sm btn-warning" @click="modify($index)" data-toggle="modal" data-target="#editModal">修改</button>
                </td>
            </tr>
            </tbody>
        </table>
        <!--edit-->
        <div v-if="isSelectClass" class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">编辑课程</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label  class="col-sm-2 control-label">编辑名称</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control"v-model="selectClass.subject_name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">编辑学分</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" v-model="selectClass.degree">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                        <button type="button" class="btn btn-primary" @click="modify(-1)">提交更改</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal -->
        </div>

        <!--delete-->
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">删除课程</h4>
                    </div>
                    <div class="modal-body">确定删除此课程吗</div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger"  @click="deleteIt(-1)">删除</button>
                        <button type="button" class="btn btn-success" class="btn btn-default" data-dismiss="modal">关闭</button>
            </div>
            </div>
            </div>
        </div>

        <!-- 增加 -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            &times;
                        </button>
                        <h4 class="modal-title">添加课程</h4>
                    </div>
                    <div class="modal-body">
                        <label>输入课程名称</label><input type="text" class="form-control" v-model="newClassName">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" @click="check">提交更改</button>
                </div><!-- /.modal-content -->
            </div><!-- /.modal -->
            </div>
            </div>

    </div>
</template>

<script>
import mainajax from '../request/mainajax.js'
    export default{
        data(){
            return {
                newClassName:'',isSelectClass:false,
                selectClass:{},
                classes:[],index:null
            }
        },
        components:{

        },
        methods:{
            check(){
                var _self=this
                var obj={}
                obj.chose="checkName"
                obj.className=this.newClassName
                mainajax.methods.getObj(obj,'admin/admin.php',function(data){
                    console.log(data)
                    if(data){_self.passed=true}
                })
            },
            deleteIt(index){
                var _self=this
                if(index>-1){
                    _self.index=index
                }else{
                    var obj={}
                    obj.chose="deleteSubject"
                    obj.subject_name=_self.classes[_self.index].subject_name
                    mainajax.methods.getObj(obj,'admin/admin.php',function(data){
                        alert("删除!")
                    })
                }
                console.log(this.index)
            },
            modify(index){//修改课程信息
                var _self=this
                if(index>-1){
                   _self.selectClass=_self.classes[index]
                   _self.isSelectClass=true
                   _self.index=index
                }else{
                    var obj={}
                    obj.chose="modifySubject"
                    obj.subject_id=_self.classes[_self.index].subject_id
                    obj.subject_name=_self.selectClass.subject_name
                    obj.degree=_self.selectClass.degree
                    console.log(obj)
                    mainajax.methods.getObj(obj,'admin/admin.php',function(data){
                    console.log(data)
                })
                }
            },
            save(){
                //请求：存入数据
            }
        },
        ready(){
            var _self=this
            var obj={}
            obj.chose="subjects"
            mainajax.methods.getObj(obj,'admin/admin.php',function(data){
                _self.classes=data
            })
        }
    }
</script>
