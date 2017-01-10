<template>
    <div class="container expecial">
        <ol class="breadcrumb">
            <li><span class="fa fa-home"></span></li>
            <li>Dashboard</li>
        </ol>
        <div class="container">
            <div class="row" style="padding: 0 30px">
                <div class="col-md-3" style="background: #fff;padding: 0;margin-top: 30px">
                    <div class="i-box">
                        <span class="i-box-font">Users</span>
                        <span class="label label-success pull-right" style="padding-top: 5px;margin-top: 3px">All</span>
                    </div>
                    <div class="i-box-content">
                        <span><i class="fa fa-users"></i>{{count.userscount}}</span>
                    </div>
                </div>
                <div class="col-md-3 col-md-offset-1" style="background: #fff;padding: 0;margin-top: 30px">
                    <div class="i-box">
                        <span class="i-box-font">Articles</span>
                        <span class="label label-success pull-right" style="padding-top: 5px;margin-top: 3px">All</span>
                    </div>
                    <div class="i-box-content">
                        <span><i class="fa fa-file-text-o"></i>{{count.articlecount}}</span>
                    </div>
                </div>
                <div class="col-md-3 col-md-offset-1" style="background: #fff;padding: 0;margin-top: 30px">
                    <div class="i-box">
                        <span class="i-box-font">Comments</span>
                        <span class="label label-success pull-right" style="padding-top: 5px;margin-top: 3px">All</span>
                    </div>
                    <div class="i-box-content">
                        <span><i class="fa fa-comment"></i>{{count.commentcount}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default{
        data(){
            return {
                count:{
                    userscount:'',
                    articlecount:'',
                    commentcount:'',
                }
            }
        },
        mounted(){
            this.$http.get('api/admin/dashboard').then((response)=>{
                this.count=response.data;
            })
        },
    }
</script>


