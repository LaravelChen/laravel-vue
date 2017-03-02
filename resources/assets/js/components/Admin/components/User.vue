<template>
    <div class="container expecial">
        <ol class="breadcrumb">
            <li><span class="fa fa-user"></span></li>
            <li>User</li>
        </ol>
        <div class="container">
            <div class="col-md-12 table-responsive" style="background: #fff;margin:30px 0">
                <div class="usersmember-h3">
                    <h3>
                        All Users
                    </h3>
                </div>
                <paginate :per="10" name="users" :list="users" class="paginate-list">
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Avatar</th>
                            <th>Name</th>
                            <th>Eamil</th>
                            <th>Created_time</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="(user,index) in paginated('users')">
                            <td style="padding-left:20px">{{user.id}}</td>
                            <td style="padding-left:20px"><img class="img-circle" width="40px" height="40px"
                                                               v-bind:src="user.avatar"></td>
                            <td>{{user.name}}</td>
                            <td>{{user.email}}</td>
                            <td>{{user.created_at}}</td>
                            <td>
                                <router-link :to="{ name: 'edituser', params: { id: user.id }}" class="btn btn-edit"
                                             tag="a"><i class="fa fa-pencil"></i></router-link>
                                <a v-on:click="deleteuser(index,user.id)" class="btn btn-delete"><i
                                        class="fa fa-trash-o"></i></a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </paginate>
                <paginate-links v-if="users.length>10" for="users" class="col-md-6 col-md-offset-3" :limit="5"></paginate-links>
            </div>
        </div>
    </div>
</template>

<script>
import toastr from './js/toastr.min.js'
import toastroption from './js/options.js'
    export default{
        data(){
            return {
                users:[],
                paginate: ['users'],
            }
        },
        mounted(){
            this.$http.get('api/admin/users').then((response)=>{
                this.users=response.data;
            });
             toastr.options=toastroption;
        },
        methods:{
            deleteuser(index,data){
                this.$http.post('api/admin/deleteuser/'+data).then((response)=>{
                    this.users.splice(index,1);
                    toastr.success('You delete the user success!');
                })
            },
        },
    }



</script>
