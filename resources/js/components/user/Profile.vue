<template>
    <article class="box box-flush">
        <div class="thread-content box-body text-gray-40 text-16">
            <h4 class="lesson-title"><strong>个人资料</strong></h4>
            <ul class="list-group mt20">
                <li class="list-group-item">用户名：<span>{{ user.name }}</span></li>
                <li class="list-group-item">邮箱：<span>{{ user.email }}</span></li>
            </ul>
        </div>
    </article>
</template>

<script>
    import {mapState} from 'vuex'
    export default {
        computed: {
            ...mapState({
                user:state =>state.AuthUser
            })
        },
    }
</script>