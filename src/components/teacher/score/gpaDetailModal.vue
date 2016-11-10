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
                            {{stud_detail.name}}的成绩单({{stud_detail.sid}})
                        </h4>
                    </div>
                    <div class="modal-body">
                        <ul class="list-group"  v-for="d in stud_detail.scores">
                            <li class="list-group-item">{{d.subject}}：{{d.score}}</li>
                        </ul>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">关闭
                        </button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal -->
            </div>
    </div>
</template>
<style>

</style>
<script>
    export default{
        data(){
            return{

            }
        },
        props:{
            stud_detail:{
                type:Object,
                twoWay:true
            }
        }
    }
</script>
