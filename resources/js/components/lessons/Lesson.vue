<template>
    <div>
        <video-play src=""></video-play>
        <lesson-body></lesson-body>

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
        }
    }
</script>