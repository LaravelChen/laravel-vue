<template>
    <div class="container expecial">
        <ol class="breadcrumb">
            <li><span class="fa fa-user"></span></li>
            <li>Comment</li>
        </ol>
        <div class="container">
            <div class="col-md-12 table-responsive" style="background: #fff;margin:30px 0">
                <div class="usersmember-h3">
                    <h3>
                        All Comments
                    </h3>
                </div>
                <paginate :per="10" name="comments" :list="comments" class="paginate-list">
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Comment_name</th>
                            <th>Body</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="(comment,index) in paginated('comments')">
                            <td style="padding-left:20px">{{comment.id}}</td>
                            <td style="padding-left:20px">{{comment.name}}</td>
                            <td>{{comment.body | excerpt}}</td>
                            <td>{{comment.created_at}}</td>
                            <td>
                                <router-link :to="{ name: 'editcomment', params: { id: comment.id }}"
                                             class="btn btn-edit"
                                             tag="a"><i class="fa fa-pencil"></i></router-link>
                                <a @click="deletecomment(index,comment.id)"
                                   class="btn btn-delete"><i class="fa fa-trash-o"></i></a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </paginate>
                <paginate-links v-if="comments.length>10"  for="comments" class="col-md-6 col-md-offset-3"
                                :limit="5"></paginate-links>
            </div>
        </div>
    </div>
</template>

<script>
import toastr from './js/toastr.min.js'
import toastroption from './js/options.js'
    export default{
        data(){
            return{
                comments:[],
                paginate: ['comments'],
            }
        },
        filters: {
            excerpt: function (value) {
              if(value.length>40){
                  value=value.substring(0,40)+'...';
              }
              return value;
           }
        },
        mounted(){
            this.$http.get('api/admin/commentsinfo').then((response)=>{
                this.comments=response.data;
            });
            toastr.options=toastroption;
        },
        methods:{
            deletecomment(index,data){
                  this.$http.post('api/admin/deletecomment/'+data).then((response)=>{
                    this.comments.splice(index,1);
                    toastr.success('You delete the comment success!')
                })
            },
        }
    }



</script>
