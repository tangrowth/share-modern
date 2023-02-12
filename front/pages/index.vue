<template>
  <div class="container">
    <h1>ホーム</h1>
    <div v-for="post in posts" :key="post.id">
      <div class="post">
        <p>{{ post.user_id }}</p>
        <img src="img/heart.png" alt="いいね">
        <div @click="deletePostData(post.id)"><img src="img/cross.png" alt="削除"></div>
        <img src="img/detail.png" alt="詳細" @click="$router.push(('/'))">
        <p>{{ post.content }}</p>
      </div>
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
      this.posts = resData.data.posts;
    },
    async deletePostData(id) {
      await this.$axios.delete("http://127.0.0.1:8000/api/post/" + id);
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