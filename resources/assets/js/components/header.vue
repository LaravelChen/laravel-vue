<template>
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" data-toggle="collapse" data-target="#app-navbar-collapse"
                        class="navbar-toggle collapsed"><span class="sr-only">Toggle Navigation</span> <span
                        class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span></button>
                <router-link to="/" tag="a" class="navbar-brand">LaravelChen</router-link>
            </div>
            <div id="app-navbar-collapse" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li>
                        <router-link to="/" tag="a">Article</router-link>
                    </li>
                    <li>
                        <router-link to="/discussion" tag="a">Discssion</router-link>
                    </li>
                </ul>

                <ul v-if="users.login == false" class="nav navbar-nav navbar-right">
                    <li><a href="login">Login In</a></li>
                    <li><a href="register">Register</a></li>
                </ul>

                <ul v-if="users.login" class="nav navbar-nav navbar-right">
                    <li>
                        <router-link to="/notification" tag="a" style="font-size:18px"><i class="fa fa-bell"><span
                                style="color:#FF7F24;font-size:15px">{{notreadcount}}</span></i></router-link>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                           aria-expanded="false">
                            {{users.name}} <span class="caret"></span>&nbsp&nbsp
                            <img class="img-circle" width="40" v-bind:src="users.avatar">
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <router-link to="/commenttotal" tag="a">评论汇总</router-link>
                            </li>
                            <li>
                                <router-link to="/userlove" tag="a">我的收藏</router-link>
                            </li>
                            <li v-if="users.is_admin">
                               <a href="/admin">管理后台</a>
                            </li>
                            <li>
                                <a href="/logout">
                                    退出登录
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</template>

<script>
    export default{
         props:['users'],
         data(){
             return {
                 count:'',
             }
         },
         computed:{
            notreadcount(){
                setInterval(() => {
                         this.$http.get('api/notread').then((response)=>{
                                 if(response.data!='0'){
                                     this.count=response.data;
                                 }else{
                                      this.count='';
                                 }
                         });
                }, 100);
                return this.count;
            },
         },
    }


</script>
