<template>
    <div>
        <video-play src="" :video_Path="lesson.video_Path" :video_img="lesson.video_img" :next_id="1" :prev_id="2"></video-play>
        <lesson-body :lesson="lesson"></lesson-body>
    </div>

</template>

<script>

    import LessonBody from './LessonBody';
    import VideoPlay from './VideoPlay';

    export default {
        name: "Lesson",
        components: {
            LessonBody,
            VideoPlay
        },
        mounted() {
            axios.get('/api/lessons/' + this.$route.params.id).then(response => {
                this.lesson = response.data.data.lesson;
                console.log(this.lesson);
            });
        },
        data() {
            return {
                lesson: {}
            }
        }
    }
</script>