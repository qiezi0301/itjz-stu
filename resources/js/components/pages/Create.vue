<template>
    <div class="container mt20">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <article id="participation-edit" class="reply participation clear Article-List Article-Post">
                    <form action="/discuss/store" method="post">
                        <div class="form-group mt20">
                            <input hidden placeholder="帖子标题" v-model="title" type="text" class="form-control title--create" style="height: 40px;">
                        </div>
                        <div class="form-group mt20" id="editor">
                            <mavon-editor v-model="content" :toolbars="toolbars" style="height: 100%"/>
                        </div>
                        <div class="form-group mt20" >
                            <v-select v-model="selected" :options="options" taggable></v-select>
                        </div>
                        <file-upload target="http://localhost:8000/api/upload" action="POST" v-on:progress="progress" v-on:start="startUpload" v-on:finish="finishUpload"></file-upload>
                        <div class="form-group mt20 text-right">
                            <button id="publishButton" class="lesson-watch-later-button btn btnBlack"
                               style="font-weight: bold;  margin-bottom: 20px;">发布新的帖子
                            </button>
                        </div>
                    </form>
                </article>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10">
                <div> {{ title }}</div>
                <markdown-body v-model="content"></markdown-body>
                <div> {{ selected }}</div>
                <div> {{ filename2 }}</div>
            </div>
        </div>
    </div>
</template>

<script>
    import vSelect from 'vue-select';
    import { mavonEditor } from 'mavon-editor'
    import 'mavon-editor/dist/css/index.css'

    import MarkdownBody from './../common/markdown-body'
    import FileUpload from 'vue-simple-upload/dist/FileUpload'
    export default {
        name: "create",
        components:{
            vSelect,
            mavonEditor,
            MarkdownBody,
            FileUpload
        },
        data() {
            return {
                title:'',
                content:'',
                selected:'',
                options: ['foo','bar','baz'],
                filename2:'',
                toolbars: {
                    bold: true, // 粗体
                    italic: true, // 斜体
                    header: true, // 标题
                    underline: true, // 下划线
                    strikethrough: true, // 中划线
                    mark: true, // 标记
                    superscript: true, // 上角标
                    subscript: true, // 下角标
                    quote: true, // 引用
                    ol: true, // 有序列表
                    ul: true, // 无序列表
                    link: true, // 链接
                    imagelink: true, // 图片链接
                    code: true, // code
                    table: true, // 表格
                    fullscreen: true, // 全屏编辑
                    readmodel: false, // 沉浸式阅读
                    htmlcode: true, // 展示html源码
                    help: true, // 帮助
                    /* 1.3.5 */
                    undo: true, // 上一步
                    redo: true, // 下一步
                    trash: true, // 清空
                    save: true, // 保存（触发events中的save事件）
                    /* 1.4.2 */
                    navigation: true, // 导航目录
                    /* 2.1.8 */
                    alignleft: true, // 左对齐
                    aligncenter: true, // 居中
                    alignright: true, // 右对齐
                    /* 2.2.1 */
                    subfield: true, // 单双栏模式
                    preview: true, // 预览
                }
            }
        },
        methods: {
            startUpload(e) {
                // file upload start event
                console.log(e+'开始上传');
            },
            finishUpload(e) {
                // file upload finish event
                console.log(e+'上传完成');
            },
            progress(e) {
                // file upload progress
                // returns false if progress is not computable
                console.log(e+"上传中");
            }
        },
        updated() {
            console.log('AuthUser.email' + this.$store.state.AuthUser.email);
        }
    }
</script>

<style>
    #editor {
        margin: auto;
        width: 100%;
        height: 580px;
    }
    .Article-List {
        background: #fff;
        list-style: none;
        padding: 0;
        margin: 0;
        -webkit-box-shadow: 0 3px 8px rgba(0,0,0,.5);
        box-shadow: 0 3px 8px rgba(0,0,0,.5);
    }
    .Article-List.Article-Post {
        padding: 15px 20px 1px 30px;
        overflow: visible;
        font-size: 16px;
        line-height: 26px;
        word-break: normal;
    }
    .mt20 {
        margin-top: 20px;
    }
</style>