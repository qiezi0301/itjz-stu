<template>
    <article class="box box-flush">
        <div class="thread-content box-body text-gray-40 text-16">
            <h4 class="lesson-title"><strong>修改密码</strong></h4>
            <edit-password-form></edit-password-form>
        </div>
    </article>
</template>

<script>
    import EditPasswordForm from './EditPasswordForm'

    export default {
        name: "edit-password",
        components: {
            EditPasswordForm
        }
    }
</script>