<template>
  <div class="container">
    <div class="form">
      <h1 class="form-ttl">新規登録</h1>
      <input v-model="name" type="text" placeholder="ユーザーネーム" required><br/>
      <input v-model="email" type="email" placeholder="メールアドレス" required/><br/>
      <input v-model="password" type="password" placeholder="パスワード" required/><br/>
      <button @click="register">新規登録</button>
    </div>
  </div>
</template>

<script>
import firebase from "~/plugins/firebase";
export default {
  data() {
    return {
      name: null,
      email: null,
      password: null,
    };
  },
  methods: {
    register() {
      if (!this.email || !this.password) {
        alert("メールアドレスまたはパスワードが入力されていません。");
        return;
      }
      firebase
        .auth()
        .createUserWithEmailAndPassword(this.email, this.password)
        .then((data) => {
          const sendData = {
            id: data.user.uid,
            name: this.name,
          };
          this.$axios.post("http://127.0.0.1:8000/api/user", sendData);
          this.$router.replace('/login')
        })
        .catch((error) => {
          switch (error.code) {
            case "auth/invalid-email":
              alert("メールアドレスの形式が違います。");
              break;
            case "auth/email-already-in-use":
              alert("このメールアドレスはすでに使われています。");
              break;
            case "auth/weak-password":
              alert("パスワードは6文字以上で入力してください。");
              break;
            default:
              alert("エラーが起きました。しばらくしてから再度お試しください。");
              break;
          }
        });
    },
  },
};
</script>

<style scoped>
.container {
  background-color: midnightblue;
}

.form-ttl {
  color: aliceblue;
  font-size: 20px;
}
</style>