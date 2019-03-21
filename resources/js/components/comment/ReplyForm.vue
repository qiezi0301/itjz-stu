<template>
    <div>
        <div v-bind:class="[completed ? 'hidden' : 'show']">
            <div class="form-group">
                <textarea v-model="replybody" autofocus="autofocus" class="form-control" data-vv-scope="__global__" aria-required="true" aria-invalid="false"></textarea>
                <!---->
            </div>
            <button v-show="replybody"  type="submit" class="btn btn-success btn-sm" @click="submitReply">回复评论</button>
            <button class="btn btn-sm btn-link" v-on:click="toggleCompletion(completed)">取消</button>
        </div>
        <div v-bind:class="[completed ? 'show' : 'hidden']">
        <!--<a class="reply">-->
            <!--<span class="votes-count">0</span>-->
            <!--<i class="fa fa-heart" aria-hidden="true"></i>-->
        <!--</a>-->
        <a class="reply" v-on:click="toggleCompletion(completed)">回复</a>
        <!--<a class="save">分享</a>-->
        <!---->
        </div>
    </div>
</template>

<script>
    export default {
        name: "ReplyForm",
        props: ['parentId'],
        data() {
            return{
                completed:true,
                replybody:''
            }
        },
        methods: {
            toggleCompletion(completed) {
                this.completed = !completed;
            },
            submitReply() {
                axios.post('/api/comment', {
                    'type': 'Lesson',
                    'model': this.$route.params.id,
                    'body': this.replybody,
                    'parentId': this.parentId
                }).then(response => {
                    console.log(response.data);
                    // this.newComment.body = response.data.body;
                    // this.comments.push(this.newComment);
                    this.replybody = '';
                    // this.count ++
                })
            }
        }
    }
</script>