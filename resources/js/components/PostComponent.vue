<template>
    <div>
        <div v-if="loading">...CARICAMENTO...</div>
        <div v-else-if="errorMessage.length > 0">
            {{ errorMessage }}
        </div>

        <div v-else-if="posts.length > 0">
            <div v-for="post in posts" :key="post.id">
                <span @click="showPost(post.id)">
                    {{ post.title }}
                </span>
            </div>
        </div>
        <div v-else>
            Nessun post da visualizzare :(
        </div>
    </div>
</template>

<script>
export default{
    name: 'PostComponent',
    data(){
        return{
            posts: [],
            errorMessage: '',
            loading: true
        }

    },

    mounted(){
        console.log('PostComponent exists');

        axios.get('/api/posts').then(({data})=>{
            if(data.success){
                this.posts = data.results;
            } else {
                this.errorMessage = data.error;
            } this.loading = false;
        })
    },

    methods: {
        showPost(id){
            console.log(id);
            axios.get('api/posts/' + id).then(response=>console.log(response))
            .catch(e=>{
                console.log('errore', e)
            })
        }
    }
}
</script>

<style lang="scss" scoped>

</style>


