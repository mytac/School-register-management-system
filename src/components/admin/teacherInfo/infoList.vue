<style scoped>

</style>
<template>
    <div>
        <table class="table table-striped">
            <caption>{{branch}}</caption>
            <thead>
            <tr>
                <th>id</th>
                <th>姓名</th>
                <th>生日</th>
                <th>籍贯</th>
                <th>所属部门</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="t in teacherlists">
                <td>{{t.tid}}</td>
                <td>{{t.name}}</td>
                <td>{{t.birth}}</td>
                <td>{{t.hometown}}</td>
                <td>{{t.department}}</td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>

    export default{
        data(){
            return {

            }
        },
        props:{
            branch:{type:String},
            teacherlists:{type:Array}
        }
    }
</script>
