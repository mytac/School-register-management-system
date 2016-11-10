<style scoped>

</style>
<template>
    <div>
        <tr v-for="s in studentscore">
            <td>{{s.name}}</td>
            <td>{{s.score}}</td>
        </tr>
        <p>{{studentscore}}</p>
    </div>
</template>

<script>
    export default{
        data(){
            return{
                studentscore:[
                    {name:'张三',score:10},
                    {name:'李四',score:10}
                ]
            }
        },
/*        props:{
            studentscore:{
                type:Array,
                twoWay:true
            }
        }*/
    }
</script>
