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
                    <a href="https://www.codecasts.com/series/highly-available-server-cluster" class="block-wrapper full-width">
                        <img class="b-lazy b-loaded"
                             alt="高可用服务架构"
                             src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22348%22%20height%3D%22225%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20348%20225%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_16901017b99%20text%20%7B%20fill%3A%23eceeef%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A17pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_16901017b99%22%3E%3Crect%20width%3D%22348%22%20height%3D%22225%22%20fill%3D%22%2355595c%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22116.71875%22%20y%3D%22120.15%22%3EThumbnail%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E"
                             >
                    </a>
                    <div class="toolbar flex flex-between align-center">
                        <p class="max60" style="margin-top: 10px;">
                            <strong>时长:</strong> <a href="/learn/laravel" class="toolbar-tag ">146 分钟</a>
                        </p>
                        <div class="flex align-center">
                            <time datetime="2017-06-27 06:42:48" class="m-r-1">
                                <strong> 15 个视频 </strong>
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
