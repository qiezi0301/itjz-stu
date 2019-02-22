<template>
    <div>
        <div class="row video-row video-mobile">
            <div class="container">
                <div class="col-md-10">
                    <div class="next-lesson previous">
                        <a href="https://www.codecasts.com/series/highly-available-server-cluster/episodes/1">
                            <svg t="1499272216574" class="icon" style="" viewBox="0 0 1024 1024" version="1.1"
                                 xmlns="http://www.w3.org/2000/svg" p-id="1010"
                                 xmlns:xlink="http://www.w3.org/1999/xlink"
                                 width="20" height="20">
                                <path d="M877.216 491.808" p-id="1011" fill="#ffffff"></path>
                                <path d="M758.528 949.984c12.512-12.512 13.248-31.872 2.048-43.776L384.096 529.696c-16.16-15.328-16.096-19.328 0-35.424L760.576 117.824c11.232-11.872 10.464-31.264-2.048-43.776-12.736-12.736-32.608-13.44-44.448-1.632L295.872 490.592C290.72 495.744 288.416 502.464 288 509.376l0 5.248c0.448 6.944 2.752 13.632 7.872 18.784l418.176 418.176C725.92 963.392 745.824 962.688 758.528 949.984z"
                                      p-id="1012" fill="#ffffff"></path>
                            </svg>
                        </a>
                    </div>
                    <div class="next-lesson next">
                        <a href="https://www.codecasts.com/series/highly-available-server-cluster/episodes/2">
                            <svg t="1499272149423" class="icon" style="" viewBox="0 0 1024 1024" version="1.1"
                                 xmlns="http://www.w3.org/2000/svg" p-id="2615"
                                 xmlns:xlink="http://www.w3.org/1999/xlink"
                                 width="20" height="20">
                                <path d="M685.770333 503.013157 234.961455 67.864711 299.369332 5.718523 750.166016 440.855189 750.369047 440.659181 814.545455 502.640081 814.359971 502.819133 814.545455 502.998198 750.137577 565.144381 749.962519 564.975379 301.047529 998.266931 236.871121 936.313572 685.770333 503.013157Z"
                                      p-id="2616" fill="#ffffff"></path>
                            </svg>
                        </a>
                    </div>
                    <video
                            id="myVideo"
                            class="video-js vjs-big-play-centered vjs-fluid vjs-paused codecasts_video-dimensions vjs-controls-enabled vjs-workinghover vjs-v6 vjs-user-inactive"
                            controls
                            role="region"
                            style="outline: none;"
                            lang="zh"
                            poster="/images/oceans.png"
                            data-setup='{"playbackRates":[0.5,1,1.25,1.5,1.75,2]}'>
                        <source src="/images/oceans.mp4" type="video/mp4"/>
                        <p class="vjs-no-js">
                            无法播放该视频，请换一个
                            <a href="https://videojs.com/html5-video-support/" target="_blank">
                                支持HTML5视频功能的浏览器
                            </a>
                        </p>
                    </video>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="container">
                <div class="col-md-10 col-md-offset-1">
                    <article class="article clearfix">
                        <h1 class="lesson-title">
                            Nginx 实现负载均衡
                            <a class="btn btn-default pay video-weixin video-btn not-mobile not-pad">收藏</a>
                            <a target="_blank" href="//shang.qq.com/wpa/qunwpa?idkey=31435d309d493dcf3eef7f06cdc697edffefccbda13c43df97e47ca38e797034" style="color: rgb(34, 34, 34);">
                                <img border="0" src="//pub.idqqimg.com/wpa/images/group.png" alt="codecasts 官方群-3" title="codecasts 官方群-3">
                                <span>595928952</span>
                            </a>
                        </h1>
                        <p class="lesson-title-meta">
                            <a href="https://www.codecasts.com/series/highly-available-server-cluster" style="font-weight: bold;">高可用服务架构 </a>
                            <span style="font-weight: bold;"> >> </span>
                            <a href="https://www.codecasts.com/series/highly-available-server-cluster/episodes/2" style="font-weight: bold;">Nginx 实现负载均衡</a>
                            视频发布于 2018-08-16
                        </p>
                        <div class="lesson-body col-sm-12">
                            使用 Nginx 的代理功能实现负载均衡的架构。
                        </div>
                        <div class="social-share"></div>
                    </article>
                </div>
            </div>
        </div>
        <comment-list></comment-list>
        <comment-form></comment-form>
    </div>

</template>

<script>
    import 'social-share.js/dist/css/share.min.css';
    import 'social-share.js/dist/js/social-share.min';

    import CommentList from '../comment/CommentList';
    import CommentForm from '../comment/CommentForm';

    export default {
        name: "Lesson",
        components: {
            CommentList,
            CommentForm
        },
        mounted() {
            this.initVideo();
        },
        methods: {
            initVideo() {
                //初始化视频方法
                let myPlayer = this.$video(myVideo, {
                    //确定播放器是否具有用户可以与之交互的控件。没有控件，启动视频播放的唯一方法是使用autoplay属性或通过Player API。
                    controls: true,
                    //建议浏览器是否应在<video>加载元素后立即开始下载视频数据。
                    preload: "auto"
                });
            }
        }
    }
</script>