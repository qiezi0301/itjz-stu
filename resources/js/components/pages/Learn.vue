<template>
    <div>
        <div class="jumbotron"><div class="container"><h2 class="jumbotron__heading">选择合适你的学习路径</h2></div></div>
        <div class="learn-page">
            <div class="board container">
                <section class="laravel">
                    <a href="https://www.codecasts.com/learn/laravel">
                        <div class="tile cover">
                            <i class="devicons devicons-laravel"></i>
                            <h5>后端工程师之路</h5>
                        </div>
                    </a>
                </section>
                <section class="javascript">
                    <a href="https://www.codecasts.com/learn/frontend">
                        <div class="tile cover">
                            <i class="devicons devicons-javascript"></i>
                            <h5>前端系列大集合</h5>
                        </div>
                    </a>
                </section>
                <section class="terminal">
                    <a href="https://www.codecasts.com/learn/tools">
                        <div class="tile cover">
                            <i class="devicons devicons-terminal"></i>
                            <h5>开发工具大杂烩</h5>
                        </div>
                    </a>
                </section>
                <section class="php">
                    <a href="https://www.codecasts.com/learn/skills">
                        <div class="tile cover">
                            <i class="devicons devicons-code"></i>
                            <h5>代码的禅意人生</h5>
                        </div>
                    </a>
                </section>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Learn"
    }
</script>