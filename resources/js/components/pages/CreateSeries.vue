<template>
    <div class="container mt20">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <article id="participation-edit" class="reply participation clear Article-List Article-Post">
                    <form action="/discuss/store" method="post">
                        <div class="form-group mt20">
                            <input placeholder="系列标题" v-model="title" type="text" class="form-control title--create" style="height: 40px;">
                        </div>
                        <div class="form-group mt20">
                            <textarea required="required" placeholder="系列描述" name="content" cols="50" rows="10" class="input-naked input-naked--textarea"></textarea>
                        </div>
                        <div class="form-group mt20 text-right">
                            <button id="publishButton" class="lesson-watch-later-button btn btnBlack"
                               style="font-weight: bold;  margin-bottom: 20px;">发布新系列
                            </button>
                        </div>
                    </form>
                </article>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                title:'',
                content:'',
            }
        },
        methods: {
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