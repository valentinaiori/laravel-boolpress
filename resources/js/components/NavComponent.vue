<template>
    <div>
        <ul>
            <li v-for="link, index in nav" :key="index">
                <router-link :to="link.path">{{ link.label }}</router-link>
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    name: 'NavComponent',
    props: {
        nav: Array
    }
}
</script>

<style lang="scss" scoped>
ul {
    display: flex;
    list-style-type: none;

    li {
        padding: 10px 5px;
    }
}
</style>
