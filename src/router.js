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
    '/tStudMng/:teacherInfo':{
        component (resolve) {
            require(['./views/tstudmng.vue'], resolve);
        },
        name:'student_info_manage'
    },
    '/teacherMng/:teacherInfo':{
        component (resolve) {
            require(['./views/techermgn.vue'], resolve);
        },
        name:'teacher_self_info',

    },
    '/tScore/:teacherInfo':{
        component (resolve) {
            require(['./views/tscore.vue'], resolve);
        },
        name:'students_scores_manage'
    },
    /*学生*/
    '/Sinfo/:teacherInfo':{
        component (resolve) {
            require(['./views/sinfo.vue'], resolve);
        },
        name:'students_basic_info'
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