<template>
    <div class="box text-gray-50">
        <div class="box-heading d-flex align-items-center justify-content-between">
            <div class="text-16">目录</div>
        </div>
        <!-- 垂直导航栏 -->
        <div class="menuList">
            <div v-for="lesson in lessons" :key="lesson.id">
                <router-link :to="{ name:'lessons', params: {id:lesson.id}}">{{ lesson.title }}</router-link>
            </div>
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
  },
    mounted() {
        axios.get('/api/lessonsBySerie/' + this.$route.params.id).then(response => {
            console.log(response);
            this.lessons = response.data.data.lessons;
        });
    },
    data() {
        return {
            lessons:[]
        }
    }
}
</script>