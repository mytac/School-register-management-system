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
                <th>政治面貌</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="t in teacherlists">
                <td>{{t.id}}</td>
                <td>{{t.realname}}</td>
                <td>{{t.birth}}</td>
                <td>{{t.hometown}}</td>
                <td>{{t.political}}</td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import mainajax from '../../../request/mainajax.js'

    export default{
        data(){
            return {

            }
        },
        props:{
            branch:{
                type:String,
                twoWay:true
            },
            teacherlists:{
                type:Array,
                twoWay:true
            }
        },
        ready(){

        }
    }
</script>
