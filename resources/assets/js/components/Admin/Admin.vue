<template>
    <div id="app">
        <SideBar :admin="admin"></SideBar>
        <div id="content">
            <div id="content-header">
                <router-view></router-view>
            </div>
        </div>
    </div>
</template>

<script>
import SideBar from './components/Sidebar.vue'
export default{
    name: 'app',
    data(){
        return {
            admin:[],
        }
    },
    mounted(){
        this.$http.get('api/admin/info').then((response)=>{
            this.admin=response.data;
        })
    },
    components:{
        SideBar,
    }
}
</script>
