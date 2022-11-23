<template>
    <div class="d-flex flex-column pt-5">
        <div v-if="loading">
            Just a moment, files are uploading....
        </div>
        <div v-else-if="!detail" class="d-flex flex-column align-items-center pt-5">
            <h1 class="pb-4">I miei Post</h1>
            <PostListComponent v-if="!detail" @requestPage="loadPage" :postsobject='posts' @showPost='showDetails'/>
        </div>
        <div v-else-if="detail" class="p-5 d-flex flex-column">
            <DetailPostComponent :post='detail' />
            <button class="btn btn-danger my-5" @click="showList">Back to List</button>
        </div>
        <div v-else class="d-flex flex-column align-items-center">
            Al momento non sono presenti file da visualizzare
        </div>
    </div>
  </template>

  <script>
import PostListComponent from './PostListComponent.vue'
import DetailPostComponent from './DetailPostComponent.vue'
  export default {
  name:'PostsComponent',
  components:{
    PostListComponent,
    DetailPostComponent
  },
  data(){
     return {
        posts:undefined,
        errorMessage:'',
        loading: true,
        detail: undefined,
      }
  },
  methods:{
    loadPage(url){
        axios.get(url).then(({data})=>{
        if(data.success){
            console.log(data.results)
            this.posts= data.results
        }else{
            this.errorMessage = data.error
        }
        this.loading = false
      })
    },
    showDetails(id){
        this.loading=true;
        axios.get('/api/posts/' +id)
        .then(response=>{
            this.detail = response.data.success? response.data.results : undefined;
            this.loading=false;
            console.log(this.detail)
        }).catch(e=>{
            console.log(e);
            this.loading = false;
        })
    },

    showList() {
            this.detail = undefined;
        },
  },
  mounted(){
      this.loadPage('api/posts')
  }
  }
  </script>

  <style lang="scss" scoped>
        button{
            width: 300px;
        }
  </style>
