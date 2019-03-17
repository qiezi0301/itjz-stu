<template>
    <div>
        <div class="jumbotron index">
            <div class="container series-home Home__sumary" style="z-index: 2;">
                <div class="series-banner">
                    <h1 class="jumbotron__heading index">
                        从高质量的视频中学习
                        <br>
                        Web 开发技术
                    </h1>
                </div>
                <h4 class="jumbotron__sub-heading not-mobile not-pad" style="margin-bottom: 72px;">
                    投资在学习上的时间和金钱总有一天会回赠给你自己 ！
                </h4>
                <div class="slogan-iphone">
                    <a href="#series-all" class="btn-action btn-action-primary">
                        马上学习
                    </a>
                </div>
            </div>
        </div>

        <main id="series-all">
            <div class="series-message">
                投资在学习上的时间和金钱总有一天会回赠给你自己 ！
            </div>
            <div class="grid flex">
                <article class="card flex flex-column box-shadow" v-for="serie in series" :key="serie.id">
                    <div class="flex align-center flex-between p-1">
                        <div class="flex align-center max70">
                            <h2 class="m-b-0 max70">
                                <router-link :to="{ name:'series', params: {id:serie.id}}">{{ serie.title }}</router-link>
                            </h2>
                        </div>
                    </div>
                    <p class="flex-full p-1 p-t-0 p-b-0">
                        {{ serie.description }}
                    </p>
                    <router-link :to="{ name:'series', params: {id:serie.id}}" class="block-wrapper full-width">
                        <img class="b-lazy b-loaded" :alt="serie.title" :src="serie.banner">
                    </router-link>
                    <div class="toolbar flex flex-between align-center">
                        <p class="max60" style="margin-top: 10px;">
                            <strong>时长:</strong> <a href="/learn/laravel" class="toolbar-tag ">{{ serie.durationCount }} 分钟</a>
                        </p>
                        <div class="flex align-center">
                            <time datetime="2017-06-27 06:42:48" class="m-r-1">
                                <strong> {{ serie.videoCount }} 个视频 </strong>
                            </time>
                        </div>
                    </div>
                </article>
            </div>

        </main>
    </div>
</template>

<script>
    export default {
        mounted() {
            axios.get('/api/series').then(response => {
                this.series = response.data.data;
            });
        },
        data() {
            return {
                series: []
            }
        }

    }
</script>
