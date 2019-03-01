<template>
    <div>
        <div id="form" class="login">
            <form action="/user/login" method="post">
                <input type="hidden" name="_token" value="kSJVZLKYLJQ1JfqjYQIZwCohYOy0kYzJiqMdpI5d">
                <div class="form-group">
                    <label for="email" class="control-label">邮箱:</label>
                    <input id="email" name="email" type="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password" class="control-label">密码:</label>
                    <input id="password" name="password" type="password" value="" class="form-control">
                </div>
                <div class="form-group buttons">
                    <button type="submit" class="btn btn-primary btnBlack" style="font-weight: bold;">
                        马 上 登 录
                    </button>
                    <a href="https://www.codecasts.com/password/reset" class="text-muted">忘 记 密 码?</a>
                    <div class="row" style="margin-top: 14px;">
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <a href="https://www.codecasts.com/auth/github">
                                <i class="fa fa-github"></i> 使用Github登录

                            </a>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <a href="https://www.codecasts.com/auth/weibo" class="pull-right">
                                <i class="fa fa-weibo"></i> 使用微博登录

                            </a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div id="context-switch">
            <div class="t-pico">
                没有帐户？</div>
            <div class="switch">
                <a id="switch-link" href="/user/register">马上注册</a>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Login"
    }
</script>

<style scoped>

</style>