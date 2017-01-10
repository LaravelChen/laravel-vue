<template>
    <div class="container">
        <div class="col-md-10 col-md-offset-1 notification">
            <h1 class="text-center">全部通知<a @click="allread" class="pull-right"><i class="fa fa-check"></i>全部已读</a></h1>
            <ul class="notification-ul">
                <li v-for="notification in notifications">
                    <router-link tag="a" :to="{ name: 'article', params: { id: notification.article_id }}">
                        <div class="media notification-media">
                            <div class="media-left">
                                <a href="#">
                                    <img class="media-object img-circle" v-bind:src="notification.avatar"
                                         style="width: 60px;height: 60px">
                                </a>
                            </div>
                            <div class="media-body">
                                <h5 style="color:#7a7a7a" class="media-heading">{{notification.from_name}}评论:</h5>
                                <p style="margin-bottom:0;padding-right:50px;color:#333">{{notification.body}}</p>
                                <span style="color:#aeaeae">来自:LaravelChen博客</span>
                                <span class="pull-right" style="color:#aeaeae;margin-right:20px">{{notification.updated_at}}</span>
                            </div>
                        </div>
                    </router-link>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
    export default{
       data(){
            return {
               notifications:[],
            }
       },
       mounted(){
            this.$http.get('api/notification').then((response)=>{
                this.notifications=response.data;
            })
       },
       methods:{
            allread(){
                this.$http.get('api/allread').then((response)=>{
                      console.log(response.data);
                })
            },
       }
    }
</script>
