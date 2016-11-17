/**
fileName:mainajax.js
author:cool zjz
time:17:03
**/
var $=require('jquery')
function mainajax(url,type,Obj,sucfunc,syncType){
    $.ajax({
        url: 'http://localhost:3000/'+url,
        type: type,
        data : 'data='+JSON.stringify(Obj),
        //dataType:'String',
        contentType:'application/json;charset=utf-8',
        crossDomain:true,
        async:syncType,
        success:sucfunc,
        error:function (e) {
            console.log(e)
            alert("请求失败,在console里查看详情")
        }
    })
}
function ajaxwithreturn(url,Obj){
    var result;
    $.ajax({
        url: 'http://localhost:3000/'+url,
        type: 'GET',
        data : 'data='+JSON.stringify(Obj),
        //dataType:'String',
        contentType:'application/json;charset=utf-8',
        crossDomain:true,
        async:false,
        success:function(data){
            result=data
        },
        error:function (e) {
            console.log(e)
            alert("请求失败,在console里查看详情")
        }
    })
    return result;
}
export default{
    data(){
        return{
        }
    },
    methods:{
        getObj:function (obj,url,fuc,syncType) {//syncType为true开启同步
            if(!syncType){mainajax(url,'GET',obj,fuc,false)}
        else{
            mainajax(url,'GET',obj,fuc,true)
        }
        },
        getReturn:function (url,obj) {
            return ajaxwithreturn(url,obj)
        }
    },
    components:{

    }
}