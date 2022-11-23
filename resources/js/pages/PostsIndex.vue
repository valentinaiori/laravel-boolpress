<template>
    <div class="d-flex flex-column pt-5">
        <div v-if="loading">
            Just a moment, files are uploading....
        </div>
        <div v-else-if="!detail" class="d-flex flex-column align-items-center pt-5">
            <h1 class="pb-4">I miei Post</h1>
            <PostListComponent v-if="!detail" @requestPage="loadPage" :postsobject='posts' @showPost='showDetails' />
        </div>

        <div v-else class="d-flex flex-column align-items-center">
            Al momento non sono presenti file da visualizzare
        </div>
    </div>
</template>

<script>
import PostListComponent from '../components/PostListComponent.vue'

export default {
    name: 'PostsIndex',
    components: {
        PostListComponent
    },
    data() {
        return {
            posts: undefined,
            errorMessage: '',
            loading: true,
            detail: undefined,
        }
    },

    methods: {
        loadPage(url) {
            axios.get(url).then(({ data }) => {
                if (data.success) {
                    console.log(data.results)
                    this.posts = data.results
                } else {
                    // this.errorMessage = data.error
                    this.$router.push({ name: 'NotFound'})
                }
                this.loading = false
            }).catch(e => {
                console.log(e);
            })
        },

        showPost(id) {
            console.log('hai cliccato il post con id', id);

        },

        showDetails(id) {
            console.log(id);
            this.$router.push('/posts/' +id)
        }
    },

    mounted() {
        const page = this.$route.query.page? this.$route.query.page : 1;
        this.loadPage('api/posts?page=' + page)
    }
}
</script>

<style lang="scss" scoped>
button {
    width: 300px;
}
</style>
