<template>
    <div class="row">
        <div id="Comments-Reply-Form" class="container Replies__From comments">
            <div class="mt-2" style="display: flex;">
                <img src="https://secure.gravatar.com/avatar/6e69e4dbdd164deb9e388622027f8bbb?s=256&d=monsterid&r=g" style="width: 50px; height: 50px;">
                <form style="flex: 1 1 0%; margin-left: 24px;">
                    <div class="form-group">
                        <textarea v-model="content" row="5" name="body" placeholder="发表评论..." required="required" class="form-control" data-vv-scope="__global__" aria-required="true" aria-invalid="true"></textarea>
                        <!---->
                    </div>
                    <button v-show="content" type="button" @click="submit" class="btn btn-success">发布评论</button>
                    <button v-show="content" class="btn btn-link">取消</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "CommentForm",
        data() {
            return {
                content:''
            }
        },
        methods:{
            submit: function () {
                alert(this.content);
            }
        }
    }
</script>