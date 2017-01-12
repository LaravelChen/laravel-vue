<template>
    <div>
        <div class="container expecial">
            <div class="container-fluid">
                <div class="jumbotron text-center">
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1"><h1 data-v-06a33fa2=""> This is CommentTotal Page.</h1>
                            <h3 data-v-06a33fa2="">One World,One Laravel!</h3></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="commenttotal" v-for="comment in total">
                    <div class="commenttotal-title">
                        <router-link :to="{ name: 'article', params: { id: comment.article_id }}"tag="a">{{comment.title}}</router-link>
                    </div>
                    <div class="commenttotal-body">
                        {{comment.body}}
                    </div>
                    <div  class="commenttotal-time">
                        评论发表于:{{comment.updated_at}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default{
       data(){
          return {
             total:[]
          }
       },
       mounted(){
          this.$http.get('api/commenttotal').then((response)=>{
              this.total=response.data;
          })
       },
    }
</script>
