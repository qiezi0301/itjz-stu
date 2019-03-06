<template>
    <div class="box text-gray-50">
        <div class="box-heading d-flex align-items-center justify-content-between">
            <div class="text-16">目录</div>
        </div>
        <!-- 垂直导航栏 -->
        <div class="menuList">
            <div data-toggle="collapse" data-target="#demo" class="mb-3 mt-3"> <strong>1、社区代码开源啦</strong></div>
            <ul class="menuList collapse" id="demo">
                <li><router-link to="/">开发环境Windows篇</router-link></li>
                <li><router-link to="/lessons/2">The Laravel Way</router-link></li>
            </ul>

            <div data-toggle="collapse" data-target="#demo1" class="mb-3 mt-3"> <strong>2、如何正确的发布提问贴</strong></div>
            <ul class="menuList collapse" id="demo1">
                <li><router-link to="/lessons/3">课程介绍</router-link></li>
                <li><router-link to="/lessons/4">开发环境Mac篇</router-link></li>
            </ul>
        </div>
    </div>
</template>

<script>
// import DocsIcon from '@icons/file-document-outline'
// import DocsIcon from "vue-material-design-icons/Menu.vue"
export default {
  name: 'quick-docs',
  components: {
    // DocsIcon
  }
}
</script>