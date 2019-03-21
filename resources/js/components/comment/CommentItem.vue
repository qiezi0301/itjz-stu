<template>
    <div class="comment mb-5">
        <a class="avatar avatar-large">
            <img width="60px" :src="avatar" class="b-lazy b-loaded">
        </a>
        <div class="content">
            <!--<a href="/user/f4cklangzi" class="author">{{ comment.user.name }}</a>-->
            {{ comment.user.name }}
            <div class="metadata">
                <span class="date" style="font-weight: 700;">
                    {{ comment.updated_at }}
                </span>
            </div>
            <div class="text Post-body">
                <!---->
                <div style="margin-top: 2px;">
                    <div>
                        <p>{{ comment.body }}</p>
                    </div>
                </div>
            </div>
            <div class="actions">
                <reply-form :parentId="comment.id"></reply-form>
            </div>
        </div>

            <!--<reply-item></reply-item>-->

    </div>
</template>

<script>
    import ReplyForm from './ReplyForm';
    import ReplyItem from './ReplyItem';
    export default {
        name: "CommentItem",
        props: ['comment'],
        components:{
            ReplyItem,
            ReplyForm
        },
        computed: {
            avatar() {
                return 'http://static.itjz.cn/'+this.comment.user.avatar
            },
        },
    }
</script>