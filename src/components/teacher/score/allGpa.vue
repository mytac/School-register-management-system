<template>
    <div>
        <table class="table">
            <thead>
            <tr>
                <th>姓名</th>
                <th>学号</th>
                <th>各科平均分</th>
                <th>班级</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="y in scorelist" @click="showDetail($index)"  data-toggle="modal" data-target="#myModal">
                <td>{{y.stud_name}}</td>
                <td>{{y.stud_id}}</td>
                <td>{{y.average}}</td>
                <td>{{y.class_id}}班</td>
            </tr>
            </tbody>
        </table>
        <gpa-detail v-if="gpaD" :stud_detail.sync="studD"></gpa-detail>
    </div>
</template>
<style scoped>
    tr{cursor: pointer}
</style>
<script>
    import mainajax from '../../../request/mainajax.js'
    import gpaD from './gpaDetailModal.vue'
    export default{
        data(){
            return{
                gpaD:false,studD:{},studAll:[]
            }
        },
        methods:{
            showDetail(index){
                this.studD=this.studAll[index]
                this.gpaD=true
            }
        },
        components:{
            'gpa-detail':gpaD
        },
        props:{
            scorelist:{
                type:Array,
                twoWay:true
            }
        },
        watch:{
        },
        ready(){
            //处理数据
            var _self=this
            function changeObj(obj){
                var arr=[]
                for(var i in obj){
                    if(/^[\u4e00-\u9fa5]+$/i.test(i)){
                        var tempobj={}
                        tempobj.subject=i
                        tempobj.score=obj[i]
                        if(tempobj){arr.push(tempobj)}
                        delete obj[i]
                    }
                }
                obj.scores=arr
                return obj
            }

            function deconstuct(arr){
                arr.forEach(function(a){
                    changeObj(a)
                })
                return arr
            }

            //main
            this.$watch('scorelist', function(newVal, oldVal){
                _self.studAll=deconstuct(newVal)
            });


        }
    }
</script>
