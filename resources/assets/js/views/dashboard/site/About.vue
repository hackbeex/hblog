<template>
    <vue-form :title="$t('form.edit_article')">
        <div slot="buttons">
            <router-link to="/dashboard/site" class="btn btn-default" exact>{{ $t('form.back') }}</router-link>
        </div>
        <div slot="content">
            <about-form :about="about"></about-form>
        </div>
    </vue-form>
</template>

<script>
import AboutForm from './Form'

export default {
    components: { AboutForm },
    data() {
        return {
            about: undefined
        }
    },
    created() {
        this.$http.get('about').then((response) => {
            this.about = response.data.data
        })
    },
}
</script>
