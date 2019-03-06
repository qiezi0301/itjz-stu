<template>
    <article class="box box-flush">
        <div class="thread-content box-body text-gray-40 text-16">
            <h4 class="lesson-title"><strong>修改资料</strong></h4>
            <edit-profile-form></edit-profile-form>
        </div>
    </article>
</template>

<script>
    import EditProfileForm from './EditProfileForm'

    export default {
        name: "edit-profile",
        components: {
            EditProfileForm
        }
    }
</script>