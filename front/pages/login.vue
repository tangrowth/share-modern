<template>
  <div class="container">
    <div class="form">
      <h1 class="form-ttl">ログイン</h1>
      <input v-model="email" type="email" placeholder="メールアドレス" required />
      <br />
      <input v-model="password" type="password" placeholder="パスワード" required />
      <br />
      <button @click="login">ログイン</button>
    </div>
  </div>
</template>


<script>
import firebase from '~/plugins/firebase'
export default {
  data() {
    return {
      email: null,
      password: null,
    }
  },
  methods: {
    login() {
      if (!this.email || !this.password) {
        alert('メールアドレスまたはパスワードが入力されていません。')
        return
      }
      firebase
        .auth()
        .signInWithEmailAndPassword(this.email, this.password)
        .then(() => {
          alert('ログインが完了しました')
          this.$router.push('/')
        })
        .catch((error) => {
          switch (error.code) {
            case 'auth/invalid-email':
              alert('メールアドレスの形式が違います。')
              break
            case 'auth/user-disabled':
              alert('ユーザーが無効になっています。')
              break
            case 'auth/user-not-found':
              alert('ユーザーが存在しません。')
              break
            case 'auth/wrong-password':
              alert('パスワードが間違っております。')
              break
            default:
              alert('エラーが起きました。しばらくしてから再度お試しください。')
              break
          }
        })
    },
  },
}
</script>

<style scoped>
.container{
  background-color: midnightblue;
}
.form-ttl{
  color: aliceblue;
  font-size: 20px;
}
</style>