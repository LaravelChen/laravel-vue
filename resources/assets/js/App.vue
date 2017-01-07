<template>
    <div id="app">
        <BolgHeader :users="users"></BolgHeader>
        <router-view :users="users"></router-view>
    </div>
</template>

<script>
import BolgHeader from './components/header.vue'
export default {
   name: 'app',
   data(){
        return {
               users:[]
           }
        },
   mounted(){
        this.$http.get("/api/userprofile").then((response)=>{
            this.users=response.data;
        })
   },
  components:
  {
     BolgHeader
  },
}
</script>
