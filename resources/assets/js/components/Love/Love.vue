<template>
    <div class="hidden-sm hidden-xs">
        <link href="//cdn.bootcss.com/animate.css/3.5.0/animate.min.css" rel="stylesheet">
        <a class="love-flag" @click="showsub"><i class="fa fa-chevron-down"></i></a>
        <transition enter-active-class="animated fadeInLeft"
                    leave-active-class="animated fadeOutRight"
        >
            <ul v-show="isshow" class="love-ul">
                <li><a @click="lovesub">{{islove}}</a></li>
            </ul>
        </transition>
    </div>
</template>
<script>
import toastr from '../Admin/components/js/toastr.min.js'
import toastroption from '../Admin/components/js/options.js'
    export default{
        data(){
            return {
                isshow:false,
                islove:"收藏",
            }
        },
        mounted(){
            this.$http.post('api/lovefont/'+this.$route.params.id).then((response)=>{
                this.islove=response.data.lovefont;
            });
             toastr.options=toastroption;
        },
        methods:{
           showsub(){
               this.isshow=!this.isshow;
           },
           lovesub(){
               this.$http.post('api/lovesub/'+this.$route.params.id).then((response)=>{
                if(response.data.lovefont=='已收藏'){
                 toastr.success('恭喜您！收藏成功 !');
                 }
                this.islove=response.data.lovefont;
            })
           }
        },
    }

</script>
