/**
fileName:mainajax.js
author:cool zjz
time:17:03
**/
function mainajax(url,type,Obj,sucfunc){
    $.ajax({
        url: 'http://localhost:3000/'+url,
        type: type,
        data : 'data='+JSON.stringify(Obj),
        //dataType:'String',
        contentType:'application/json;charset="utf-8"',
        crossDomain:true,
        //async:false,
        success:sucfunc,
        error:function (e) {
            console.log(e)
            alert("请求失败")
        }
    })
}
export default{
    data(){
        return{
        }
    },
    methods:{
        getpageQuery:function (curpage,type,url,fuc) {//分页查
            var ResultVo={}
            ResultVo.currentpage = curpage;
            ResultVo.pageSize = 10;
            mainajax(url,'POST',ResultVo,fuc)
        },
        putObj:function (obj,url,fuc) {
            mainajax(url,'PUT',obj,fuc)
        },
        postObj:function (obj,url,fuc) {
            mainajax(url,'POST',obj,fuc)
        },
        getObj:function (obj,url,fuc) {
            mainajax(url,'GET',obj,fuc)
        },
        test:function(url,obj,fuc){//测试
            mainajax(url,'POST',obj,fuc)
        }
    },
    components:{

    }
}