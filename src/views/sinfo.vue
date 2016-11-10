<template>
    <div>
        <div>
            <ul class="list-group">
                <li class="list-group-item"><span>学号：</span>{{student.sid}}</li>
                <li class="list-group-item"><span>姓名：</span>{{student.name}}</li>
                <li class="list-group-item"><span>性别：</span>{{student.sex}}</li>
                <li class="list-group-item"><span>生日：</span>{{student.birth}}</li>
                <li class="list-group-item"><span>籍贯：</span>{{student.hometwon}}</li>
                <li class="list-group-item"><span>学院：</span>{{student.department}}</li>
                <li class="list-group-item"><span>专业：</span>{{student.major}}</li>
                <li class="list-group-item"><span>班级：</span>{{student.sclass}}班</li>
                <li class="list-group-item"><span>身份证号：</span>{{student.identify}}</li>
            </ul>
        </div>
    </div>
</template>
<style>

</style>
<script>
//...请求学生信息
var fakeStud={sid:'20135612',name:'张三',birth:'95-01-21',sex:'男',hometwon:'西藏',department:'计算机学院',major:'网工',sclass:'1',identify:'120104199501207640'}
    export default{
        data(){
            return{
                student:fakeStud
            }

        },
        components:{

        }
    }
</script>
