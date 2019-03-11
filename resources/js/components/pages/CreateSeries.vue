<template>
    <div class="container mt20">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <article id="participation-edit" class="reply participation clear Article-List Article-Post">
                    <form @submit.prevent="addSeries">
                        <div class="form-group mt20">
                            <input placeholder="系列标题" v-model="title" type="text" class="form-control title--create" style="height: 40px;">
                        </div>
                        <div class="form-group mt20">
                            <textarea v-model="description" required="required" placeholder="系列描述" name="description" cols="50" rows="10" class="input-naked input-naked--textarea"></textarea>
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
                description:'',
            }
        },
        methods: {
            addSeries() {
                alert("addSeries");
            }
        }
    }
</script>