<template>
    <vue-form :title="$t('page.site')">
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
        this.$http.get('about/edit').then((response) => {
            this.about = response.data;
        });
    },
}
</script>
