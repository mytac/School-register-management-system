<style scoped>
    span{font-weight: bold}
</style>

<template>
    <div>
        <div>
            <ul class="list-group">
                <li class="list-group-item"><span>姓名：</span>{{teacher.realname}}</li>
                <li class="list-group-item"><span>性别：</span>{{teacher.sex}}</li>
                <li class="list-group-item"><span>生日：</span>{{teacher.birth}}</li>
                <li class="list-group-item"><span>所属部门：</span>{{teacher.branch_id}}</li>
                <li class="list-group-item"><span>籍贯：</span>{{teacher.hometown}}</li>
                <li class="list-group-item"><span>学历：</span>{{teacher.education}}</li>
                <li class="list-group-item"><span>政治面貌：</span>{{teacher.political}}</li>
            </ul>
            <button class="btn btn-info" data-toggle="modal" data-target="#modifyed">修改</button>
            <div  class="modal fade" id="modifyed" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                &times;
                            </button>
                            <h4 class="modal-title" id="myModalLabel">
                                修改信息
                            </h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label>姓名</label><input class="form-control" type="text" v-model=teacher.realname disabled>
                                <label>性别</label><input class="form-control" type="text" v-model="teacher.sex" disabled>
                                <label>生日</label><input class="form-control" type="text" v-model="teacher.birth" disabled>
                                <label>所属部门</label><input class="form-control" type="text" v-model="teacher.branch_id" disabled>
                                <label>籍贯</label><input class="form-control" type="text" v-model="teacher.hometown" disabled>
                                <label>学历</label><input class="form-control" type="text" v-model="teacher.education" disabled>
                                <label>政治面貌</label><input class="form-control" type="text" v-model="teacher.political" disabled>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" @click="modify()">修改</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal" @click="save()">保存</button>
                        </div>
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
            return{
                teacher:{}
            }
        },
        methods:{
            modify(){
                $('input').removeAttr('disabled')
            },
            save(){
                var info=this.teacher
                var _self=this
                var tempObj={}
                var property=''
                for(var i in info){
                   tempObj[i]='\''+info[i]+'\''
                }
                $('input').attr('disabled',true)
                var arr=[]
                arr.push(tempObj)
                mainajax.methods.getObj(arr,'teacher/teacherInfoModify.php',function(data) {
                   console.log(data)
                })
                
            }
        },
        ready(){
           this.teacher=JSON.parse(this.$route.params.teacherInfo)
        }
    }
</script>
