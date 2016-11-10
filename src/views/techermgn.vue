<style scoped>
    span{font-weight: bold}
</style>

<template>
    <div>
        <div>
            <ul class="list-group">
                <li class="list-group-item"><span>姓名：</span>{{teacher.name}}</li>
                <li class="list-group-item"><span>性别：</span>{{teacher.sex}}</li>
                <li class="list-group-item"><span>生日：</span>{{teacher.birth}}</li>
                <li class="list-group-item"><span>所属部门：</span>{{teacher.branch}}</li>
                <li class="list-group-item"><span>籍贯：</span>{{teacher.hometwon}}</li>
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
                                <label>姓名</label><input class="form-control" type="text" v-model="teacher.name" disabled>
                                <label>性别</label><input class="form-control" type="text" v-model="teacher.sex" disabled>
                                <label>生日</label><input class="form-control" type="text" v-model="teacher.birth" disabled>
                                <label>所属部门</label><input class="form-control" type="text" v-model="teacher.branch" disabled>
                                <label>籍贯</label><input class="form-control" type="text" v-model="teacher.hometwon" disabled>
                                <label>学历</label><input class="form-control" type="text" v-model="teacher.education" disabled>
                                <label>政治面貌</label><input class="form-control" type="text" v-model="teacher.political" disabled>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" @click="modify()">修改</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal" @click="save(teacher)">保存</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal -->
            </div>
        </div>
    </div>
</template>

<script>
    //...请求拿到该教师的信息/000
    var fakeTeacher={name:'张三',birth:'95-01-21',sex:'男',hometwon:'西藏',branch:'计算机学院',education:'博士',political:'党员'}
    export default{
        data(){
            return{
                teacher:fakeTeacher
            }
        },
        methods:{
            modify(){
                $('input').removeAttr('disabled')
            },
            save(info){
                $('input').attr('disabled',true)
                //。。请求:保存修改后的数据/000
                console.log(info)
            }
        }
    }
</script>
