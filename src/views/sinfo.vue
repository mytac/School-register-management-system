<template>
    <div>
        <div>
            <ul class="list-group">
                <li class="list-group-item"><span>学号：</span>{{student.id}}</li>
                <li class="list-group-item"><span>姓名：</span>{{student.name}}</li>
                <li class="list-group-item"><span>性别：</span>{{student.sex}}</li>
                <li class="list-group-item"><span>生日：</span>{{student.birth}}</li>
                <li class="list-group-item"><span>籍贯：</span>{{student.hometown}}</li>
                <li class="list-group-item"><span>学院号：</span>{{student.branch_id}}</li>
                <li class="list-group-item"><span>班级：</span>{{student.class_id}}班</li>
                <li class="list-group-item"><span>身份证号：</span>{{student.identify}}</li>
            </ul>
        </div>
    </div>
</template>
<style>

</style>
<script>

    export default{
        data(){
            return{
                student:{}
            }

        },
        ready(){
             this.student=JSON.parse(this.$route.params.teacherInfo)
        }
    }
</script>
