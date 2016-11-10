<style scoped>
    form{overflow: hidden}
   .form-group{width:45%;float: left}
   .form-group:nth-child(odd){margin-right: 10%}
</style>
<template>
    <div>
        <!-- 模态框（Modal） -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            &times;
                        </button>
                        <h4 class="modal-title" id="myModalLabel">
                            {{stud_detail.name}}的详情({{stud_detail.sid}})
                        </h4>
                    </div>
                    <div class="modal-body">
                        <form role="form">
                            <div class="form-group">
                                    <label>姓名</label>
                                    <input type="text" class="form-control" v-model="stud_detail.name" disabled>
                            </div>
                            <div class="form-group">
                                <label>学号</label>
                                <input type="text" class="form-control" v-model="stud_detail.sid" disabled>
                            </div>
                            <div class="form-group">
                                <label>生日</label>
                                <input type="text" class="form-control" v-model="stud_detail.birth" disabled>
                            </div>
                            <div class="form-group">
                                <label>性别</label>
                                <input type="text" class="form-control" v-model="stud_detail.sex" disabled>
                            </div>
                            <div class="form-group">
                                <label>身份证</label>
                                <input type="text" class="form-control" v-model="stud_detail.identify" disabled>
                            </div>
                            <div class="form-group">
                                <label>学院</label>
                                <input type="text" class="form-control" v-model="stud_detail.department" disabled>
                            </div>
                            <div class="form-group">
                                <label>专业</label>
                                <input type="text" class="form-control" value="{{stud_detail.major}}{{stud_detail.sclass}}班" disabled>
                            </div>
                            <div class="form-group">
                                <label>籍贯</label>
                                <input type="text" class="form-control" v-model="stud_detail.hometown" disabled>
                            </div>

                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" @click="modify()">修改
                        </button>
                        <button type="button" class="btn btn-success" @click="compelete(stud_detail)" data-dismiss="modal">提交
                        </button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal -->
        </div>
    </div>
</template>

<script>
    export default{
        data(){
            return{

            }
        },
        props:{
            stud_detail:{type:Object,twoWay:true}
        },
        methods:{
            modify(){
                $('input').removeAttr('disabled')
            },
            compelete(info){
                $('input').attr('disabled',true)
                //....请求：这里把修改后的数据保存004
                console.log(info)
            }
        }

    }
</script>
