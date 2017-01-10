<template>
    <div>
        <link href="//cdn.bootcss.com/animate.css/3.5.0/animate.min.css" rel="stylesheet">
        <p>
            <span><a class="reply-comment" @click="replyshow">回复</a></span>
            <span v-if="users.id==isedit"><router-link :to="{name:'editcomment',params: { id: commentid }}" tag="a"
                                                       class="edit-comment">编辑</router-link></span>
        </p>

        <form method="POST" @submit.prevent="replysub(replyname)" accept-charset="UTF-8">
            <div v-show="reply.isreply" class="form-group">
                <textarea v-model="reply.reply" placeholder="尽情的评论吐槽吧!" name="reply" class="form-control"
                          required="required"></textarea>
                <div class="form-group" style="padding:15px 15px 0 15px;overflow:hidden">
                    <button type="submit" class="btn btn-success pull-right">发布评论</button>
                    <button @click="replydel" class="btn btn-default pull-right margin-right">取消评论</button>
                </div>
            </div>
        </form>

    </div>
</template>

<script>
    export default{
        props:['commentlist','article','replyname','isedit','users','commentid'],
        data(){
           return {
               reply:{
                  reply:'',
                  isreply:false,
               },
               reply_post:{
                    body:'',
                    article_id:'',
                    reply_name:'',
               },
           }
        },
        methods:{
            replyshow(){
             this.reply.isreply=!this.reply.isreply;
           },
           replydel(){
             this.reply.isreply=!this.reply.isreply;
             this.reply.reply='';
           },
           replysub(data){
             this.reply_post.body=this.reply.reply;
             this.reply_post.article_id=this.article.id;
             this.reply_post.reply_name=data;
             this.$http.post('api/replystore',this.reply_post).then((response)=>{
                  this.commentlist.push(response.data);
                  this.reply.reply='';
                  this.reply.isreply=!this.reply.isreply;
             })
           },
        }
    }






</script>
