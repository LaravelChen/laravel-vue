<template>
    <div id="sidebar" class="hidden-xs">
        <ul>
            <li>
                <div data-v-3dba5610="" class="user">
                    <div data-v-3dba5610="" class="avatar"><img data-v-3dba5610="" class="img-responsive img-circle"
                                                                v-bind:src="admin.avatar">
                    </div>
                    <div data-v-3dba5610="" class="nickname"><p data-v-3dba5610="">{{admin.name}}</p>
                        <p data-v-3dba5610="">{{admin.email}}</p></div>
                    <div data-v-3dba5610="" class="buttons">
                        <a data-v-3dba5610="" href="/"><i class="fa fa-home"></i></a>
                        <a data-v-3dba5610="" href="http://laravel-vue.dev/#/userlove"><i class="fa fa-user"></i></a>
                        <a data-v-3dba5610="" href="http://laravel-vue.dev/#/commenttotal"><i class="fa fa-cog"></i></a>
                    </div>
                </div>
            </li>
            <router-link tag="li" to="/admin">
                <a><i class="fa fa-home"></i>Dashboard</a>
            </router-link>
            <router-link  tag="li" to="/users">
                <a class="v-link-active"><i class="fa fa-user"></i>user</a>
            </router-link>
            <router-link  tag="li" to="/articles">
                <a><i class="fa fa-list"></i>Article</a>
            </router-link>
            <router-link tag="li" to="/comments">
                <a><i class="fa fa-comment"></i>Comment</a>
            </router-link>
        </ul>
    </div>
</template>

<script>
    export default{
        props:['admin'],    }
</script>

