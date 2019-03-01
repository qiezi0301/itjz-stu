<template>
    <div class="second-nav">
        <div class="container">
            <header id="header">
                <nav>
                    <ul>
                        <li class="not-mobile"><router-link to="/lessons">全部视频</router-link></li>
                        <li class="matrix"><router-link to="/learn">学习路径</router-link></li>
                        <li><router-link to="/">问答社区</router-link></li>
                        <li class="not-mobile"><router-link to="/">文章教程</router-link></li>
                    </ul>
                </nav>
            </header>
        </div>
    </div>
</template>

<script>
    export default {
        name: "TopMenu"
    }
</script>