<template>
    <div class="container expecial">
        <ol class="breadcrumb">
            <li><span class="fa fa-comment"></span></li>
            <li>Edit Comment</li>
        </ol>
        <div class="row">
            <div class="col-md-8 col-md-offset-2 edit">
                <div class="usersmember-h3">
                    <h3>
                        Edit Comment
                    </h3>
                </div>
                <form method="POST" @submit.prevent="commentsub"  class="setting" accept-charset="UTF-8">
                    <div class="form-group">
                       <label for="comment" class="control-label">Comment:</label>
                       <textarea v-model="comment.body" id="comment" name="comment" rows="10" class="form-control" required="required"></textarea>
                    </div>
                    <div class="form-group " style="margin-top: 40px">
                        <div class="col-md-12">
                            <input   class="btn btn-primary form-control letter-spcing" type="submit" value="Update">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
<script>
import toastr from '../js/toastr.min.js'
import toastroption from '../js/options.js'
    export default{
        data(){
            return{
                comment:{
                   body:'',
                }
            }
        },
        mounted(){
          this.$http.post('api/admin/editcomment/'+this.$route.params.id).then((response)=>{
              this.comment=response.data;
          });
          toastr.options=toastroption;
        },
        methods:{
            commentsub(){
                this.$http.post('api/admin/updatecomment/'+this.$route.params.id,this.comment).then((response)=>{
                    this.$router.push('/comments');
                    toastr.success('You update the comment success!')
                })
            }
        }
    }
</script>
