<template>
    <div class="container">
        <NavComponent :nav='nav'/>
        <router-view></router-view>
    </div>
</template>

<script>
import NavComponent from '../components/NavComponent.vue'

export default{
    name: 'App',
    components: {
        NavComponent
    },
    data(){
        return{
            nav: [
                {
                    path: '/',
                    label: 'Home'
                },
                {
                    path: '/posts',
                    label: 'Blog'
                },
                {
                    path: '/about',
                    label: 'Chi Siamo'
                },
                {
                    path: '/contacts',
                    label: 'Contatti'
                },

            ]

        }
    }
}
</script>



<style scoped lang="scss">


</style>
