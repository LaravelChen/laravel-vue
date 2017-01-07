
/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import VueRouter from 'vue-router'
import App from './App.vue'
import Article from './components/Article.vue'
import Discussion from './components/Discussion.vue'
import ArticleShow from './components/ArticleShow.vue'
Vue.use(VueRouter)


const routes = [
    { path: '/', component: Article },
    { path:'/discussion',component:Discussion},
    { path:'/article/:id',component:ArticleShow,name:'article'},
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
const app = new Vue({
    el: '#app',
    template: '<App/>',
    components: {App},
    router,
});

