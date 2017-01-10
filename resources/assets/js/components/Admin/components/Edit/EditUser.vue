<template>
    <div class="container expecial">
        <ol class="breadcrumb">
            <li><span class="fa fa-user"></span></li>
            <li>Edit User</li>
        </ol>
        <div class="row">
            <div class="col-md-8 col-md-offset-2 edit">
                <div class="usersmember-h3">
                    <h3>
                        Edit User
                    </h3>
                </div>
                <div class="text-center" style="background: #fff">
                    <img src="picture/default.png" class="img-circle" width="100px">
                </div>

                <form method="POST" @submit.prevent="usersub"  class="setting" accept-charset="UTF-8">
                    <div class="form-group">
                        <label for="name" class="control-label">Name:</label>
                        <input v-model="userinfo.name" id="name" name="name" type="text" class="form-control" required="required">
                    </div>
                    <div class="form-group">
                        <label for="email" class="control-label">Email:</label>
                        <input v-model="userinfo.email" id="email" name="email" type="text" class="form-control" required="required">
                    </div>
                    <div class="form-group">
                        <label for="avatar" class="control-label">Avatar:</label>
                        <input v-model="userinfo.avatar" id="avatar" name="avatar" type="text" class="form-control" required="required">
                    </div>
                    <div class="form-group " style="margin-top: 40px">
                        <div class="col-md-12">
                            <input class="btn btn-primary form-control letter-spcing" type="submit" value="Update">
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
        props:['user'],
        data(){
            return {
                userinfo:{
                    name:'',
                    email:'',
                    avatar:'',
                }
            }
        },
        mounted(){
            this.$http.post('api/admin/edituser/'+this.$route.params.id).then((response)=>{
                    this.userinfo=response.data;
            });
             toastr.options=toastroption;
        },
        methods:{
            usersub(){
                this.$http.post('api/admin/upateuser/'+this.$route.params.id,this.userinfo).then((response)=>{
                   this.$router.push('/users');
                    toastr.success('You update the user success!')
                })
            },
        },
    }
</script>
