<template>
  <div>
    <div v-if="loading">
            Just a moment, files are uploading....
    </div>
    <div v-else>
            <h1 class="mb-4">Post</h1>
            <div>
                    <h2 class="text-info">Title:</h2>
                    <h3>{{posts.title}}</h3>
            </div>
            <div>
                    <h2 class="text-info">Content:</h2>
                    <h3>{{posts.content}}</h3>
            </div>
    </div>
    <div>
        <router-link :to="{name:'posts-index'}">Back to list</router-link>
    </div>
  </div>
</template>

<script>
export default {
    name: 'PostsShow',
    data(){
        return{
            post: undefined,
            loading: true
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
        }
    },

    mounted(){
        const id = this.$route.params.id;
        this.loadPage('api/posts/' +id)
    },

}
</script>

<style>

</style>
