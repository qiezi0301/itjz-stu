<template>
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
</template>

<script>
    export default {
        name: "Video",

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