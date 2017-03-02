
/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import VueRouter from 'vue-router'
import Admin from './components/Admin/Admin.vue'
import Vuelidate from 'vuelidate'
import Home from './components/Admin/components/Home.vue'
import User from './components/Admin/components/User.vue'
import  Article from './components/Admin/components/Article.vue'
import Comment from  './components/Admin/components/Comment.vue'
import EditUser from  './components/Admin/components/Edit/EditUser.vue'
import EditComment from  './components/Admin/components/Edit/EditComment.vue'
import  CreateArticle from './components/Admin/components/Create/CreateArticle.vue'
import EditArticle from './components/Admin/components/Edit/EditArticle.vue'
import VuePaginate from 'vue-paginate'


Vue.use(VuePaginate)
Vue.use(Vuelidate)
Vue.use(VueRouter)


const routes = [
    { path: '/', redirect: '/admin', component: Home },
    { path: '/admin', component: Home },
    { path: '/users', component: User },
    { path: '/articles', component: Article },
    { path: '/comments', component: Comment },
    { path: '/createarticle', component: CreateArticle },
    { path: '/edituser/:id', component: EditUser,name:'edituser'},
    { path: '/editcomment/:id', component: EditComment,name:'editcomment'},
    { path: '/editarticle/:id', component: EditArticle,name:'editarticle'},
]

const router = new VueRouter({
    routes
})

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
//
//Vue.component('Header', require('./components/header.vue'));
const admin = new Vue({
    el: '#admin',
    template: '<Admin/>',
    components: {Admin},
    router,
});

