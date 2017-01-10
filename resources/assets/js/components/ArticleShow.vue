<template>
    <div class="container single-page-back">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <h1 class="text-center">{{article.title}}</h1>
                <love v-if="users.login"></love>
                <p class="single-article-author"><span><i
                        class="fa fa-user padding-right-10"></i>{{article.author}}</span>&nbsp&nbsp<span><i
                        class="fa fa-clock-o padding-right-10"></i>{{article.time}}</span></p>
            </div>
            <div class="col-md-10 col-md-offset-1 single-page-bottom">
                <p class="article-blog" v-html="article.body">{{article.body}}</p>
            </div>
        </div>
        <Commentcomponent :users="users" :article="article"></Commentcomponent>
    </div>
</template>


<script>
    import Commentcomponent from './Comment/Comment.vue'
    import Love from './Love/Love.vue'
    export default{
    props:['users'],
       data:function(){
         return {
             article:[]
         }
       },
       mounted:function(){
          this.$http.get('/api/article/'+this.$route.params.id).then((response)=>{
            this.article=response.data;
          })
       },
       components:{
         Commentcomponent,Love
       }
    }



</script>
