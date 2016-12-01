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
                <td>{{c.name}}</td>
                <td>{{c.degree}}</td>
                <td>
                    <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal">删除</button>
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
                                <input type="text" class="form-control"v-model="selectClass.name">
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
                        <button type="button" class="btn btn-primary" @click="save">提交更改</button>
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
                        <button type="button" class="btn btn-danger"  @click="delete">删除</button>
                        <button type="button" class="btn btn-success" class="btn btn-default" data-dismiss="modal">关闭</button>
            </div>
            </div>
            </div>
        </div>

        <!-- 模态框（Modal） -->
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
                        <button type="button" class="btn btn-primary" v-if="!passed" @click="check">提交更改</button>
                        <button type="button" class="btn btn-success" class="btn btn-default" data-dismiss="modal" v-if="passed">完成</button>
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
                newClassName:'',passed:false,isSelectClass:false,
                selectClass:{},
                classes:[{name:'编译原理',degree:4}]
            }
        },
        components:{

        },
        methods:{
            check(){
                var className=this.newClassName
                //请求：检测是否重命名，是则通过
                this.passed=true
            },
            modify(index){//修改课程信息
                this.selectClass=this.classes[index]
                this.isSelectClass=true

            },
            save(){
                //请求：存入数据
            }
        },
        ready(){

        }
    }
</script>
