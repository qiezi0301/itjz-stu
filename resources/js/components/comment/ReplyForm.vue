<template>
    <div>
        <div style="display: none;">
            <form>
                <div class="form-group">
                    <textarea name="replybody" autofocus="autofocus" class="form-control" data-vv-scope="__global__" aria-required="true" aria-invalid="false"></textarea>
                    <!---->
                </div>
                <button type="submit" class="btn btn-success btn-sm">回复评论</button>
                <button class="btn btn-sm btn-link">取消</button>
            </form>
        </div>
        <a class="reply">
            <span class="votes-count">0</span>
            <svg t="1499327478365" viewBox="0 0 1024 1024" version="1.1"
                 xmlns="http://www.w3.org/2000/svg" p-id="3526"
                 xmlns:xlink="http://www.w3.org/1999/xlink" width="10" height="10" class="icon vote">
                <path d="M999.15776 774.8096c33.12128-31.84128 33.12128-83.49184 0-115.40992L572.0576 249.1392c-33.17248-31.8208-86.97856-31.8208-120.09984 0L24.87808 659.39968c-33.17248 31.8976-33.17248 83.56864 0 115.40992 33.14176 31.88224 86.92736 31.88224 120.11008 0l367.02208-352.57344 366.99136 352.57344c33.17248 31.88224 86.9632 31.88224 120.15616 0z" p-id="3527"></path>
            </svg>
        </a>
        <a class="reply">回复</a>
        <a class="save">分享</a>
        <!---->
    </div>
</template>

<script>
    export default {
        name: "ReplyForm"
    }
</script>