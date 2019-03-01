<template>
    <div class="main-content container my-5">
        <div class="page-threads-show pb-4">
            <div class="row">
                <div class="col-md-3 position-relative">
                    <quick-docs class="mb-2" />
                </div>
                <div class="col-md-9">
                    <article class="box box-flush">
                        <div class="thread-content box-body text-gray-40 text-16">
                            <article class="article my-4 pb-2 border-bottom">
                                <h1 class="lesson-title">
                                    <strong>开发环境Windows篇</strong>
                                </h1>
                                <p class="lesson-title-meta">
                                    <a href="/" >高可用服务架构 </a>
                                    <span > >> </span>
                                    <a href="/" >社区代码开源啦</a>
                                    视频发布于 2018-08-16
                                </p>
                                <div class="social-share"></div>
                            </article>
                            <markdown-body v-model="content"></markdown-body>
                            <section data-v-1ed45ae2="" class="markdown-body"><h3>代公众号授权代码:</h3>
                                <pre class="  language-php"><code class="  language-php">        <span class="token variable">$appid</span> <span class="token operator">=</span> Yii<span class="token punctuation">:</span><span class="token punctuation">:</span><span class="token variable">$app</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token property">request</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">get</span><span class="token punctuation">(</span><span class="token single-quoted-string string">'appid'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token variable">$openPlatform</span> <span class="token operator">=</span> Yii<span class="token punctuation">:</span><span class="token punctuation">:</span><span class="token variable">$app</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token property">wechat</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token property">openPlatform</span><span class="token punctuation">;</span>
        <span class="token variable">$data</span> <span class="token operator">=</span> <span class="token variable">$openPlatform</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">getAuthorizer</span><span class="token punctuation">(</span><span class="token variable">$appid</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token variable">$appid</span> <span class="token operator">=</span> <span class="token variable">$data</span><span class="token punctuation">[</span><span class="token single-quoted-string string">'authorization_info'</span><span class="token punctuation">]</span><span class="token punctuation">[</span><span class="token single-quoted-string string">'authorizer_appid'</span><span class="token punctuation">]</span><span class="token punctuation">;</span>
        <span class="token variable">$refreshToken</span> <span class="token operator">=</span> <span class="token variable">$data</span><span class="token punctuation">[</span><span class="token single-quoted-string string">'authorization_info'</span><span class="token punctuation">]</span><span class="token punctuation">[</span><span class="token single-quoted-string string">'authorizer_refresh_token'</span><span class="token punctuation">]</span><span class="token punctuation">;</span>
        <span class="token variable">$officialAccount</span> <span class="token operator">=</span> <span class="token variable">$openPlatform</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">officialAccount</span><span class="token punctuation">(</span><span class="token variable">$appid</span><span class="token punctuation">,</span> <span class="token variable">$refreshToken</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token comment">// 回调授权地址</span>
        <span class="token variable">$url</span> <span class="token operator">=</span> <span class="token double-quoted-string string">"http://xxx.com/wechat/access-callback.html"</span><span class="token punctuation">;</span>
        <span class="token variable">$response</span> <span class="token operator">=</span> <span class="token variable">$officialAccount</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token property">oauth</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">scopes</span><span class="token punctuation">(</span><span class="token punctuation">[</span><span class="token single-quoted-string string">'snsapi_userinfo'</span><span class="token punctuation">]</span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">redirect</span><span class="token punctuation">(</span><span class="token variable">$url</span><span class="token punctuation">)</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">send</span><span class="token punctuation">(</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
                                <h3>问题</h3>
                                <ul><li>我是打算在公众号菜单加一个url,url上带有appid参数,这样就能知道是哪个公众号的用户了,但是总觉得这个方法有问题;想知道大家是怎么做的;</li>
                                </ul></section>
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