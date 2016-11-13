/**
 * Created by aresn on 16/8/22.
 */
const routers = {
    '/index': {
        component (resolve) {
            require(['./views/index.vue'], resolve);
        },
        name:'欢迎'
    },
    /*教师*/
    '/tStudMng':{
        component (resolve) {
            require(['./views/tstudmng.vue'], resolve);
        },
        name:'学生信息管理'
    },
    '/teacherMng/:teacherInfo':{
        component (resolve) {
            require(['./views/techermgn.vue'], resolve);
        },
        name:'teacher_self_info',

    },
    '/tScore':{
        component (resolve) {
            require(['./views/tscore.vue'], resolve);
        },
        name:'学生成绩管理'
    },
    /*学生*/
    '/Sinfo':{
        component (resolve) {
            require(['./views/sinfo.vue'], resolve);
        },
        name:'学生信息管理'
    },
    '/Sscore':{
        component (resolve) {
            require(['./views/sscore.vue'], resolve);
        },
        name:'学生查看成绩'
    },
    /*管理员*/
    '/Atinfo':{
        component (resolve) {
            require(['./views/atinfo.vue'], resolve);
        },
        name:'教师信息查看'
    },
    '/AclassMng':{
        component (resolve) {
            require(['./views/AclassMng.vue'], resolve);
        },
        name:'课程信息管理'
    },
    '/ATeachercomment':{
        component (resolve) {
            require(['./views/ATeachercomment.vue'], resolve);
        },
        name:'教师评价信息管理'
    },
    '/ATInfoMng':{
        component (resolve) {
            require(['./views/ATInfoMng.vue'], resolve);
        },
        name:'教师信息管理'
    },
    '/ATclassMng':{
        component (resolve) {
            require(['./views/ATclassMng.vue'], resolve);
        },
        name:'教师任课信息管理'
    },

};
export default routers;