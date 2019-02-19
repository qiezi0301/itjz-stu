<template>
    <div>
        <div class="banner banner__series"
             style="background: linear-gradient(to right, rgb(35, 37, 38), rgb(65, 67, 69)); margin-bottom: 40px;">
            <div class="container">
                <div class="col-md-6 series-flex">
                    <div class="series-text">
                        <h1 class="series-title wow flipInX animated"
                            style="visibility: visible; animation-name: flipInX; color: rgb(255, 255, 255);">
                            {{ serie.title }}
                        </h1>
                        <p style="margin-top: 20px; color: rgb(255, 255, 255);">
                            {{ serie.description }}
                        </p>
                    </div>
                </div>
                <div class="col-md-3" style="color: rgb(255, 255, 255); margin-top: 10px;"></div>
                <div class="col-md-3" style="margin-top: 10px;">
                    <div id="Completion">
                        <a href="https://www.codecasts.com/vip" class="lesson-watch-later-button btn btnBlack">订阅观看所有视频</a></div>
                </div>
            </div>
        </div>

        <main>
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <table class="episode-outline table table-hover table-striped" style="background: rgb(255, 255, 255); box-shadow: rgba(0, 0, 0, 0.36) 0px 3px 6px;">
                            <tbody>
                                <tr class="episode-wrap">
                                    <td title="已观看" class="episode-index"><i class="material-icons">check_circle</i></td>
                                    <td class="episode-title">
                                        <a href="https://www.codecasts.com/series/highly-available-server-cluster/episodes/1">
                                            <i class="material-icons md-18">play_circle_outline</i>
                                        <span class="episode-title__body">理论知识简介</span>
                                        </a>
                                    </td>
                                    <td class="episode-length">
                                        04:47 <span class="label label-primary label-create">2018-08-16 </span>
                                    </td>
                                </tr>
                                <tr class="episode-wrap">
                                    <td title="已观看" class="episode-index"><i class="material-icons">check_circle</i></td>
                                    <td class="episode-title">
                                        <a href="https://www.codecasts.com/series/highly-available-server-cluster/episodes/1">
                                            <i class="material-icons md-18">play_circle_outline</i>
                                        <span class="episode-title__body">理论知识简介</span>
                                        </a>
                                    </td>
                                    <td class="episode-length">
                                        04:47 <span class="label label-primary label-create">2018-08-16 </span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>
</template>

<script>
    export default {
        name: "Serie",
        mounted() {
            axios.get('/api/series/' + this.$route.params.id).then(response => {
                this.serie = response.data;
            });
        },
        data() {
            return {
                serie: {}
            }
        }
    }
</script>