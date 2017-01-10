<template>
    <div class="col-md-6 text-right" style="font-size:20px"><a @click="votecount" class="color-grey vote"><i class="fa fa-thumbs-o-up"></i>{{vote.votefont}}({{votes_count}})</a>
    </div>
</template>
<script>
    export default{
        data(){
            return {
                vote:{
                     vote_count:0,
                     votefont:'点赞',
                }
            }
        },
        computed:{
           votes_count(){
             return this.vote.vote_count;
           },
        },
        mounted(){
           this.$http.post('api/votecount',{'article_id':this.$route.params.id}).then((response)=>{
                 this.vote.vote_count=response.data.count;
                 this.vote.votefont=response.data.font;
           });
        },
        methods:{
           votecount(){
              this.$http.post('api/vote',{'article_id':this.$route.params.id}).then((response)=>{
                     this.vote.vote_count=response.data.count;
                     this.vote.votefont=response.data.font;
              });
           }
        },
    }
</script>
