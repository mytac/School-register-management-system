<style scoped>

</style>
<template>
    <div>
        <label>选择学院</label>
        <select class="from-control" v-model="mustLearn">
            <option value="1">必修</option>
            <option value="0">选修</option>
        </select>

        <select class="from-control" v-model="mustLearn">
            <option value="1">必修</option>
            <option value="0">选修</option>
        </select>
    </div>
</template>

<script>

    export default{
        data(){
            return {
                mustLearn:'',
            }
        },
        components:{

        }
    }
</script>
