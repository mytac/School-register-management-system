/**
fileName:mainajax.js
author:cool zjz
time:17:03
**/
function mainajax(url,type,Obj,sucfunc){
    $.ajax({
        url: 'http://192.168.1.119/11wdkj/'+url,
        type: type,
        data : JSON.stringify(Obj),
        dataType:'json',
        contentType:"application/json",
        crossDomain:true,
        async:false,
        success:sucfunc,
        error:function () {
            //alert("请求失败")
        },
        headers:{
            'Access-Control-Allow-Origin':'http://localhost:8080'
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
        propertyQuery:function (property,index,url,fuc) {//用一个对象的属性查(e.g getid删除)
            var obj={}
            eval('obj.'+property+'='+index)
            mainajax(url,'PUT',obj,fuc)
        },
        reversePropertyQuery:function (id,property,value,url,fuc) {//根据id对属性进行更改
            var obj={}
            obj.id=id
            eval('obj.'+property+'='+value)
            mainajax(url,'PUT',obj,fuc)
        },
        putObj:function (obj,url,fuc) {//直接传进一个对象
            mainajax(url,'PUT',obj,fuc)
        },
        postObj:function (obj,url,fuc) {//直接传进一个对象
            mainajax(url,'POST',obj,fuc)
        }
    },
    components:{

    }
}