<template>
    <div class="editor expecial">
        <ol class="breadcrumb">
            <li><span class="fa fa-list"></span></li>
            <li>Create Article</li>
        </ol>
        <div class="row">
            <div class="col-md-8 col-md-offset-2 edit">
                <div class="usersmember-h3">
                    <h3>
                        Create Article
                    </h3>
                </div>
                <form method="POST" @submit.prevent="articlesub" class="setting" accept-charset="UTF-8">
                    <div class="form-group">
                        <label for="title" class="control-label">Title:</label>
                        <input v-model="article.title" id="title" name="title" type="text" class="form-control" required="required">
                    </div>

                    <div class="form-group">
                        <div class="panel-body">
                            <label for="title" class="control-label">Body:</label>
                            <div style="height:200px" ref="editor" id="editor"></div>
                        </div>
                    </div>

                    <div class="form-group " style="margin-top: 40px">
                        <div class="col-md-12">
                            <input class="btn btn-primary form-control letter-spcing" type="submit" value="Create">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</template>

<style>
    .panel-body{
        padding:0;
    }
</style>

<script>
    export default{
      data() {
        return {
          editor: null,
          article:{
            body:'',
            title:'',
          },
        }
      },

      mounted() {
           this.editor = UE.getEditor(this.$refs.editor.id,{
            toolbars: [
                ['bold', 'italic', 'underline', 'strikethrough', 'blockquote', 'insertunorderedlist', 'insertorderedlist', 'justifyleft', 'justifycenter', 'justifyright', 'link', 'insertimage', 'insertcode', 'fullscreen']
            ],
            elementPathEnabled: false,
            enableContextMenu: false,
            autoClearEmptyNode: true,
            wordCount: false,
            imagePopup: false,
            autotypeset: {indent: true, imageBlockLine: 'center'}
         });
      },

      beforeDestroy() {
            if(this.editor) {
                 this.editor.destroy();
            }
      },

      methods:{
          articlesub(){
            this.article.body=this.editor.getContent();
            this.$http.post('api/admin/uploadarticle',this.article).then((response)=>{
                this.$router.push('/articles');
            })
          }
      }
    }

</script>
