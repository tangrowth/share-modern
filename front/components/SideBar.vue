<template>
  <div class="sidebar">
    <div class="side-nav">
      <div class="side-img">
        <img src="img/logo.png" alt="logo.png" class="side-img-logo">
      </div>
      <div class="side-list">
        <div class="side-item">
          <img src="img/home.png" class="side-icon">
          <NuxtLink to="/">ホーム</NuxtLink>
        </div>
        <div class="side-item" @click="logout">
          <img src="img/logout.png" class="side-icon">
          <p>ログアウト</p>
        </div>
      </div>
    </div>
    <div class="side-form">
      <p>シェア</p>
      <textarea v-model="content" name="content" class="side-form-text" required></textarea><br/>
      <button class="side-form-btn" @click="insertPost">シェアする</button>
    </div>
  </div>
</template>
<script>
import firebase from "~/plugins/firebase";
export default {
  data() {
    return {
      content: "",
    };
  },
  methods: {
    logout() {
      firebase
        .auth()
        .signOut()
        .then(() => {
          alert("ログアウトが完了しました");
          this.$router.replace("/login");
        });
    },
    async insertPost() {
      firebase.auth().onAuthStateChanged(async (user) => {
      const sendData = {
        content: this.content,
        user_id: user.uid,
      };
        await this.$axios.post("http://127.0.0.1:8000/api/post/", sendData);
        this.content = "";
        alert("投稿が完了しました")
      });
    },
  },
}
</script>
<style scoped>
.sidebar{
    background-color: midnightblue;
  }
  .side-img{
    height: 30px;
  }
  .side-img-logo{
    height: 100%;
  }
  .side-item {
    height: 30px;
    display: flex;
    padding: 5px;
  }
  .side-icon{
    height: 100%;
  }
  .side-menu{
    margin: auto 0;
    color: aliceblue;
  }
  p {
    color: aliceblue;
  }
</style>