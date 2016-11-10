<template>
    <div>
        <div class="btn-toolbar list-toolbar">
            <button class="btn btn-primary" @click="showAdd()" v-show="!back">
                <i class="fa fa-plus"></i>录入成绩</button>
            <button class="btn btn-primary"  v-show="back" @click="goBack()">《返回</button>
            <div class="btn-group">
            </div>
        </div>
        <all-gpa v-if="!add"></all-gpa>
        <add-score v-if="add"></add-score>
    </div>
</template>
<style scoped>

</style>
<script>
import addScore from '../components/teacher/score/addScore.vue'
import allGpa from '../components/teacher/score/allGpa'
    export default{
        data(){
            return{
                add:false,back:false

            }
        },
        components:{
            'add-score':addScore,
            'all-gpa':allGpa
        },
        methods:{
            showAdd(){this.add=true;this.back=true},
            goBack(){this.add=false;this.back=false}
        }
    }
</script>
