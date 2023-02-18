<template>
  <div class="detail">
    <h1>ホーム</h1>
      <Post 
        v-if="post"
        :post="post" 
        @deletePost="deletePost" />
    <div class="comment">
      <h2>コメント</h2>
      <div v-for="comment in comments" :key="comment.id">
        <div>
          <p>ユーザー名</p>
          <p>{{ comment.content }}</p>
        </div>
      </div>
      <div>
        <textarea v-model="content" name="content" required></textarea>
        <br>
        <button @click="insertComment">コメント</button>
      </div>
    </div>
  </div>
</template>

<script>
import firebase from "~/plugins/firebase";
export default {
  layout: 'PostDefault',
  data() {
    return {
      post: null,
      comment: null,
    };
  },
  methods: {
    async getPostDetail() {
      const resData = await this.$axios.get(
        `http://localhost:8000/api/post/${this.$route.params.id}`
      );
      this.post = resData.data.data;
      this.comments = resData.data.comments;
    },
    async insertComment() {
      firebase.auth().onAuthStateChanged(async (user) => {
        const sendData = {
          content: this.content,
          user_id: user.uid,
          post_id: this.post.id,
        };
        await this.$axios.post("http://127.0.0.1:8000/api/comment/", sendData);
        this.content = "";
        alert("コメントが完了しました");
      });
    },
    async deletePost(event) {
      await this.$axios.delete(`http://127.0.0.1:8000/api/post/${event.id}`);
      this.$router.push(`/`);
    },
    
  },
  created() {
    this.getPostDetail();
  },
};
</script>

<style scoped>
* {
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