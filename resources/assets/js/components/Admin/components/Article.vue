<template>
    <div class="container expecial">
        <ol class="breadcrumb">
            <li><span class="fa fa-user"></span></li>
            <li>Article</li>
        </ol>
        <div class="container">
            <div class="col-md-12 table-responsive" style="background: #fff;margin:30px 0">
                <div class="usersmember-h3">
                    <h3>
                        All Articles
                        <router-link to="createarticle" tag="a" class="btn btn-success pull-right">Create</router-link>
                    </h3>
                </div>
                <paginate :per="10" name="articles" :list="articles" class="paginate-list">
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Title</th>
                            <th>Published At</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="(article,index) in paginated('articles')">
                            <td style="padding-left:20px">{{article.id}}</td>
                            <td>{{article.title}}</td>
                            <td>{{article.created_at}}</td>
                            <td>
                                <router-link :to="{ name: 'editarticle', params: { id: article.id }}"
                                             class="btn btn-edit"
                                             tag="a"><i class="fa fa-pencil"></i></router-link>
                                <a @click="deletearticle(index,article.id)"
                                   class="btn btn-delete"><i class="fa fa-trash-o"></i></a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </paginate>
                <paginate-links v-if="articles>10" for="articles" class="col-md-6 col-md-offset-3" :limit="5"></paginate-links>
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
                articles:[],
                paginate: ['articles']
            }
        },
        mounted(){
            this.$http.get('api/admin/articles').then((response)=>{
                this.articles=response.data;
            });
               toastr.options=toastroption;
        },
        methods:{
            deletearticle(index,data){
                this.$http.post('api/deletearticle/'+data).then((response)=>{
                    this.articles.splice(index,1);
                    toastr.success('You delete the article success!');
                })
            }
        }
    }

</script>
