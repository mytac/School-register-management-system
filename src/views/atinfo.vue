<style scoped>
    select{width: 30%}
</style>
<template>
    <div>
        <form role="form">
        <div class="form-group">
            <label>选择学院</label>
            <select class="form-control" v-model="branch" @change="showList(branch)">
                <option v-for="b in branches">{{b}}</option>
            </select>
        </div>
        </form>
        <info-list :branch="branch" :teacherlists="teacherlists" v-if="list"></info-list>
    </div>
</template>

<script>
    import infoList from '../components/admin/teacherInfo/infoList.vue'

    export default{
        data(){
            return {
                list:false,
                branch:'',
                branches:['计算机学院','自动化学院','材料','管理学院'],
                teacherlists:[]
            }
        },
        methods:{
            showList(list){
                //..请求拿到该学院下的教师/000
                var faketeacherlists=[
                    {tid:'011',name:'赵四',birth:'1990-01-01',department:'计算机学院',hometown:'河北'},
                    {tid:'012',name:'赵四',birth:'1990-01-01',department:'计算机学院',hometown:'河北'},
                    {tid:'013',name:'赵四',birth:'1990-01-01',department:'计算机学院',hometown:'河北'}

                ]
                this.teacherlists=faketeacherlists
                this.list=true
            }
        },
        components:{
        'info-list':infoList
        }
    }
</script>
