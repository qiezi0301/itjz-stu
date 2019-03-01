<template>
    <div>
        <div class="jumbotron" style="margin-bottom: 20px;">
            <div class="container">
                <h1 class="jumbotron__heading">
                    视频更新列表：Laravel Vuejs 和 Web 开发视频，全在这里
                </h1>
            </div>
        </div>
        <main style="padding-bottom:20px;">
            <div class="piece">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <table class="episode-outline table table-hover table-striped" style="background: #fff;box-shadow: 0 3px 6px rgba(0, 0, 0, 0.36);">
                                <tbody>
                                <tr class="episode-wrap">
                                    <td class="episode-index" title="已观看">
                                        <i class="material-icons">check_box</i>
                                    </td>
                                    <td class="episode-title">
                                        <a href="https://www.codecasts.com/series/highly-available-server-cluster/episodes/15" class="">
                                            <i class="flaticon stroke play-4"></i>
                                            <span class="episode-title__body">MySQL 备份到云存储 AWS S3</span>
                                        </a>
                                    </td>
                                    <td class="episode-length">
                                        Aug 20, 2018
                                    </td>
                                </tr>
                                <tr class="episode-wrap">
                                    <td class="episode-index" title="已观看">
                                        <i class="material-icons">check_box</i>
                                    </td>
                                    <td class="episode-title">
                                        <a href="https://www.codecasts.com/series/highly-available-server-cluster/episodes/14" class="">
                                            <i class="flaticon stroke play-4"></i>
                                            <span class="episode-title__body">MySQL 从属数据库配置</span>
                                        </a>
                                    </td>
                                    <td class="episode-length">
                                        Aug 20, 2018
                                    </td>
                                </tr>
                                <tr class="episode-wrap">
                                    <td class="episode-index" title="已观看">
                                        <i class="material-icons">check_box</i>
                                    </td>
                                    <td class="episode-title">
                                        <a href="https://www.codecasts.com/series/highly-available-server-cluster/episodes/13" class="">
                                            <i class="flaticon stroke play-4"></i>
                                            <span class="episode-title__body">定时任务部署</span>
                                        </a>
                                    </td>
                                    <td class="episode-length">
                                        Aug 20, 2018
                                    </td>
                                </tr>
                                <tr class="episode-wrap">
                                    <td class="episode-index" title="已观看">
                                        <i class="material-icons">check_box</i>
                                    </td>
                                    <td class="episode-title">
                                        <a href="https://www.codecasts.com/series/highly-available-server-cluster/episodes/12" class="">
                                            <i class="flaticon stroke play-4"></i>
                                            <span class="episode-title__body">修复 cURL 错误</span>
                                        </a>
                                    </td>
                                    <td class="episode-length">
                                        Aug 17, 2018
                                    </td>
                                </tr>
                                <tr class="episode-wrap">
                                    <td class="episode-index" title="已观看">
                                        <i class="material-icons">check_box</i>
                                    </td>
                                    <td class="episode-title">
                                        <a href="https://www.codecasts.com/series/highly-available-server-cluster/episodes/11" class="">
                                            <i class="flaticon stroke play-4"></i>
                                            <span class="episode-title__body">使用队列发送邮件</span>
                                        </a>
                                    </td>
                                    <td class="episode-length">
                                        Aug 17, 2018
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <div class="pull-right">
                                <ul class="pagination">
                                    <li class="disabled">
                                        <span>«</span>
                                    </li>
                                    <li class="active">
                                        <span>1</span>
                                    </li>
                                    <li>
                                        <a href="https://www.codecasts.com/lessons?page=2">2</a>
                                    </li>
                                    <li>
                                        <a href="https://www.codecasts.com/lessons?page=3">3</a>
                                    </li>
                                    <li>
                                        <a href="https://www.codecasts.com/lessons?page=4">4</a>
                                    </li>
                                    <li>
                                        <a href="https://www.codecasts.com/lessons?page=5">5</a>
                                    </li>
                                    <li>
                                        <a href="https://www.codecasts.com/lessons?page=6">6</a>
                                    </li>
                                    <li>
                                        <a href="https://www.codecasts.com/lessons?page=7">7</a>
                                    </li>
                                    <li>
                                        <a href="https://www.codecasts.com/lessons?page=8">8</a>
                                    </li>
                                    <li class="disabled">
                                        <span>...</span>
                                    </li>
                                    <li>
                                        <a href="https://www.codecasts.com/lessons?page=17">17</a>
                                    </li>
                                    <li>
                                        <a href="https://www.codecasts.com/lessons?page=18">18</a>
                                    </li>
                                    <li>
                                        <a href="https://www.codecasts.com/lessons?page=2" rel="next">»</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</template>

<script>
    export default {
        name: "Lessons"
    }
</script>