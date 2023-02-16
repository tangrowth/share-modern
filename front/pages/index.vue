<template>
  <div class="container">
    <h1>ホーム</h1>
    <div v-for="post in posts" :key="post.id">
      <Post
      :post="post" 
      @deletePost="deletePost" 
      />
    </div>
  </div>
</template>

<script>
import firebase from '~/plugins/firebase'
export default {
  layout: 'PostDefault',
  data() {
    return {
      posts: [],
    };
  },
  methods: {
    async getPostData() {
      const resData = await this.$axios.get(
        "http://localhost:8000/api/post"
      );
      this.posts = resData.data.data;
    },
    async deletePost(event) {
      await this.$axios.delete(`http://127.0.0.1:8000/api/post/${event.id}`);
      this.getPostData();
    },
  },
    created() {
    this.getPostData();
  },
};
</script>
<style scoped>
*{
  background-color: midnightblue;
  color: aliceblue;
}
img {
  height: 30px;
}
.post-header {
  display: flex;
}
</style>