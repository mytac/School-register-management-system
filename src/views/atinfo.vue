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
        <info-list :branch.sync="branch" :teacherlists.sync="teacherlists" v-if="list"></info-list>
    </div>
</template>

<script>
    import mainajax from '../request/mainajax'
    import infoList from '../components/admin/teacherInfo/infoList.vue'

    export default{
        data(){
            return {
                list:false,
                branch:'',
                branches:[],
                teacherlists:[]
            }
        },
        methods:{
            showList(list){
                //..请求拿到该学院下的教师/000
                var _self=this
                var obj={}
                obj.chose="teachers"
                obj.branch=list
                mainajax.methods.getObj(obj,'admin/admin.php',function(data){
                    console.log(data)
                   _self.teacherlists=data
                   _self.list=true
                })
            }
        },
        components:{
        'info-list':infoList
        },
        ready(){
            var _self=this
            var obj={}
            obj.chose="branch"
            mainajax.methods.getObj(obj,'admin/admin.php',function(data){
                data.forEach(function(a){
                     _self.branches.push(a.name)
                })
               
            })
        }
    }
</script>
