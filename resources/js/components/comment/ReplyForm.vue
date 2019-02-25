<template>
    <div>
        <div v-bind:class="[completed ? 'hidden' : 'show']">
            <div class="form-group">
                <textarea name="replybody" autofocus="autofocus" class="form-control" data-vv-scope="__global__" aria-required="true" aria-invalid="false"></textarea>
                <!---->
            </div>
            <button type="submit" class="btn btn-success btn-sm">回复评论</button>
            <button class="btn btn-sm btn-link" v-on:click="toggleCompletion(completed)">取消</button>
        </div>
        <div v-bind:class="[completed ? 'show' : 'hidden']">
        <a class="reply">
            <span class="votes-count">0</span>
            <i class="fa fa-heart" aria-hidden="true"></i>
        </a>
        <a class="reply" v-on:click="toggleCompletion(completed)">回复</a>
        <a class="save">分享</a>
        <!---->
        </div>
    </div>
</template>

<script>
    export default {
        name: "ReplyForm",
        data() {
            return{
                completed:true
            }
        },
        methods: {
            toggleCompletion(completed) {
                this.completed = !completed;
            }
        }
    }
</script>