<template>
    <div class="row">
        <div class="container">
            <article class="media reply participation clear" style="margin-top: 20px;">
                <a href="#Comments-Reply-Form" class="btn btn-primary btn-block btnBlack">认真看看评论也可以学到很多东西</a>
            </article>
            <div id="Comments-list" class="ui threaded comments trigger example">
                <div v-for="comment in comments" :key="comment.id" :id="'reply-'+comment.id" >
                    <comment-item :comment="comment"></comment-item>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import CommentItem from './CommentItem';
    export default {
        name: "CommentList",
        data() {
            return {
                comments: [],
            }
        },
        components:{
            CommentItem
        },
        mounted() {
            axios.get('/api/lesson/' + this.$route.params.id +'/comments').then(response =>{
                this.comments = response.data;
                // console.log(response.data);
            })
        }
    }
</script>

<style>
    @import '/static/share-comment.css';
</style>