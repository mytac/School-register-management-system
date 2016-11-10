<style scoped>
    @import '../styles/common.css';
    .legal-menu li{
        cursor:pointer
    }
    .signing{background-color: #00B0E8;width: 50%;margin: auto; }
    input{width: 50%;}
</style>
<template>
    <div id="app">
        <div class="signing" v-show="!signState">
            <h1>登录</h1>
            <div class="form-group">
                <label>id</label><input type="text" class="form-control" v-model="user.id" required>
                <label>password</label><input type="password" class="form-control" v-model="user.psd" required>
                <button class="btn btn-primary" @click="sigin(user.id,user.psd)">登录</button>
            </div>
        </div>

        <div class="signed" v-show="signState">
        <div class="navbar navbar-default" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar">Ariticle</span>
                </button>
                <a class="" href=""><span class="navbar-brand" style="color:white">ADMIN</span></a></div>

            <div class="navbar-collapse collapse" style="height: 1px;">
                <ul id="main-menu" class="nav navbar-nav navbar-right">
                    <li class="dropdown hidden-xs">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <span class="glyphicon glyphicon-user padding-right-small" style="position:relative;top: 3px;"></span>
                                欢迎!{{username}}
                            <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="./">My Account</a></li>
                            <li class="divider"></li>
                            <li class="dropdown-header">Admin Panel</li>
                            <li><a href="./">Users</a></li>
                            <li><a href="./">Security</a></li>
                            <li><a tabindex="-1" href="./">Payments</a></li>
                            <li class="divider"></li>
                            <li><a tabindex="-1" href="sign-in.html">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <div class="sidebar-nav">
            <ul>
                <!--教师-->
                <span v-if="type==1">
                    <li v-link="{ path: '/teacherMng' }"><a  href="#" data-target=".dashboard-menu" class="nav-header" data-toggle="collapse">
                    <i class="fa fa-fw fa-dashboard"></i>自身信息管理</a></li>
                    <li v-link="{ path: '/tStudMng' }" data-popover="true" rel="popover" data-placement="right">
                    <a href="#" data-target=".premium-menu" class="nav-header collapsed" data-toggle="collapse"><i class="fa fa-fw fa-fighter-jet"></i>学生信息管理</a></li>
                    <li v-link="{ path: '/tScore' }"><a  href="#" data-target=".accounts-menu" class="nav-header collapsed" data-toggle="collapse"><i class="fa fa-fw fa-briefcase"></i>学生成绩管理</a></li>
                </span>
                <!--学生-->
                <span v-if="type==2">
                    <li><a v-link="{ path: '/Sinfo' }" href="#" class="nav-header"><i class="fa fa-fw fa-question-circle"></i>教师信息查看</a></li>
                    <li><a v-link="{ path: '/Sscore' }" href="#" class="nav-header"><i class="fa fa-fw fa-question-circle"></i>查看成绩</a></li>
                </span>
                <!--管理员-->
                <span v-if="type==0">
                    <li><a v-link="{ path: '/Atinfo' }" href="#" class="nav-header"><i class="fa fa-fw fa-question-circle"></i>教师基本信息查看</a></li>
                    <li><a v-link="{ path: '/AclassMng' }" href="#" class="nav-header"><i class="fa fa-fw fa-link"></i>课程信息管理</a></li>
                    <li><a v-link="{ path: '/ATeachercomment' }" href="#" class="nav-header"><i class="fa fa-fw fa-link"></i>教师评价信息管理</a></li>
                    <li><a v-link="{ path: '/ATInfoMng' }" href="#" class="nav-header"><i class="fa fa-fw fa-link"></i>教师信息管理</a></li>
                    <li><a v-link="{ path: '/ATclassMng' }" href="#" class="nav-header"><i class="fa fa-fw fa-link"></i>教师任课信息管理</a></li>
                </span>
            </ul>
        </div>

        <div class="content">
            <div class="header">

                <h1 class="page-title">{{$route.name}}</h1>
                <ul class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li>{{$route.path}}</li>
                </ul>

            </div>
            <!--tac-->
            <div class="main-content">
                <router-view></router-view>
            </div>
        </div>
            </div>

        <footer style="float:top">
            <hr>
            <p class="pull-right">Collect from <a href="http://www.cssmoban.com/" title="网页模板" target="_blank">coolzjz</a></p>
            <p>© 2016<a href="#" target="_blank">张君卓</a></p>
        </footer>
    </div>
</template>
<script>
    export default {
        data () {
            return {
                users:[],
                signState:true,
                user:{},
                username:'',
                type:0
            }
        },
        methods: {
            sigin(id,psd){
                if(id&&psd) this.signState=true
                this.username=id
                this.type=1//教师1，学生2，管理员0
            }
        },
        components:{
        }
    }
</script>
