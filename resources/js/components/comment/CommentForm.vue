<template>
    <div class="row">
        <div id="Comments-Reply-Form" class="container Replies__From comments">
            <div class="mt-2" style="display: flex;">
                <img :src="'http://static.itjz.cn/'+user.avatar" style="width: 50px; height: 50px;">
                <form style="flex: 110%; margin-left: 24px;">
                    <div class="form-group">
                        <textarea v-model="body" row="5" placeholder="发表评论..." required="required" class="form-control" data-vv-scope="__global__" aria-required="true" aria-invalid="true"></textarea>
                        <!---->
                    </div>
                    <button v-show="body" type="button" @click="submit" class="btn btn-success">发布评论</button>
                    <!--<button v-show="body" class="btn btn-link">取消</button>-->
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    import {mapState} from 'vuex'
    export default {
        name: "CommentForm",
        data() {
            return {
                body:''
            }
        },
        created() {
            console.log(this.$route.params.id);
        },
        methods:{
            submit: function () {
                let formdata = {
                    'type': 'Lesson',
                    'model': this.$route.params.id,
                    'body': this.body
                };
                axios.post('/api/comment', formdata).then( response =>  {
                    console.log(response.data.body);
                    // this.newComment.body = response.data.body;
                    // this.comments.push(this.newComment);
                    this.body = '';
                    // this.count ++
                })
            }
        },
        computed: {
            ...mapState({
                user:state =>state.AuthUser
            })
        },
    }
</script>