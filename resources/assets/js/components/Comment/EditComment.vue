<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2" style="margin-top: 50px;">
                <div class="well bs-component">
                    <form role="form" method="POST" @submit.prevent="editsub" class="form-horizontal">
                        <fieldset>
                            <legend class="text-center">Edit Comment</legend>
                            <div class="form-group" style="padding:0 30px">
                                <label  class="control-label">Comment:</label>
                                <textarea style="font-size:15px" v-model="comment" rows="10" class="form-control" required="required"></textarea>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-10 col-lg-offset-1">
                                    <button type="submit" class="btn btn-success form-control">
                                        Edit Now
                                    </button>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default{
        data(){
          return {
             comment:"",
          }
        },
        mounted(){
            this.$http.get('/api/editcommentshow/'+this.$route.params.id).then((response)=>{
                this.comment=response.data;
            })
        },
        methods:{
            editsub(){
               this.$http.post('api/editcommentupdate/'+this.$route.params.id,{'body':this.comment}).then((response)=>{
                   this.$router.push('/article/'+response.data.article_id);
               })
            }
        }
    }
</script>
