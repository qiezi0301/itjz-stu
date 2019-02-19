<template>
    <div>
        <section class="jumbotron text-center">
            <div class="container">
                <h1 class="jumbotron-heading">从高质量的视频中学习 Web 开发技术</h1>
                <p class="lead text-muted">投资在学习上的时间和金钱总有一天会回赠给你自己 ！</p>
                <p>
                    <a href="#" class="btn btn-success my-2 btn-lg" role="button">浏览所有的课程</a>
                </p>
            </div>
        </section>

        <div class="album py-5 bg-light">
            <div class="container">

                <div class="row grid">
                    <div class="col-md-4" v-for="serie in series" :key="serie.id">
                        <div class="card mb-4 box-shadow">
                            <img class="card-img-top"
                                 data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail"
                                 alt="Thumbnail [100%x225]" style="height: 225px; width: 100%; display: block;"
                                 src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22348%22%20height%3D%22225%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20348%20225%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_16901017b99%20text%20%7B%20fill%3A%23eceeef%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A17pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_16901017b99%22%3E%3Crect%20width%3D%22348%22%20height%3D%22225%22%20fill%3D%22%2355595c%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22116.71875%22%20y%3D%22120.15%22%3EThumbnail%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E"
                                 data-holder-rendered="true">
                            <div class="card-body">
                                <h2>
                                    <router-link :to="{ name:'series', params: {id:serie.id}}">{{ serie.title }}</router-link>
                                </h2>
                                <p class="card-text">{{ serie.description }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <small>时长: 146 分钟</small>
                                    <small class="text-muted">15 个视频</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
