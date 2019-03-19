<template>
    <div class="main-content container my-5">
        <div class="page-threads-show pb-4">
            <div class="row">
                <div class="col-md-12">
                    <article class="box box-flush">
                        <div class="thread-content box-body text-gray-40 text-16">
                            <article class="article my-4 pb-2 border-bottom">
                                <h1 class="lesson-title">
                                    <strong>{{ lesson.title }}</strong>{{ lesson.serie_id }}
                                </h1>
                                <p class="lesson-title-meta">
                                    <router-link :to="{ name:'series', params: {id:lesson.serie_id}}" >{{ lesson.serie }} </router-link><span > >> </span>{{ lesson.title }}     视频发布于 {{ lesson.updated_at }}
                                </p>
                                <div class="social-share"></div>
                            </article>
                            <markdown-body v-model="lesson.body"></markdown-body>
                        </div>
                    </article>
                    <comment-list></comment-list>
                    <comment-form></comment-form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import CommentList from '../comment/CommentList';
    import CommentForm from '../comment/CommentForm';
    import QuickDocs from './quick-docs'
    import MarkdownBody from './../common/markdown-body'
    import 'social-share.js/dist/css/share.min.css';
    import 'social-share.js/dist/js/social-share.min';
    export default {
        name: "LessonBody",
        props: ['lesson'],
        components:{
            CommentList,
            CommentForm,
            QuickDocs,
            MarkdownBody
        },
        data() {
            return{
                content:'',
            }
        }
    }
</script>