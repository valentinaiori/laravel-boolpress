<template>
    <div>
        <div>
            <h2>{{ post.title }}</h2>
        </div>
        <div>
            <p>{{ post.content }}</p>
        </div>
    </div>

</template>

  <script>
  export default {
  name: 'DetailPostComponent',
  props:{
      post:Object,
  }
  }
  </script>

  <style>
  </style>
