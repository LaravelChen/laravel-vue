<template>
    <div>
        <div class="container expecial">
            <div class="container-fluid">
                <div class="jumbotron text-center">
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1"><h1 data-v-06a33fa2=""> This is UserLove Page.</h1>
                            <h3 data-v-06a33fa2="">One World,One Laravel!</h3></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="commenttotal" v-for="content in loves">
                    <div class="commenttotal-title">
                        <router-link :to="{ name: 'article', params: { id: content.article_id }}"tag="a">{{content.title}}</router-link>
                    </div>
                    <div  class="commenttotal-time">
                        收藏时间:{{content.updated_at}}
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
                loves:[],
            }
        },
        mounted(){
            this.$http.get('api/lovetotal').then((response)=>{
                this.loves=response.data;
            })
        },
    }
</script>
