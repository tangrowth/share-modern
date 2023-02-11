<template>
  <div class="container">
    <h1>ホーム</h1>
    <p>{{ message }}</p>
    </div>
</template>

<script>
import firebase from '~/plugins/firebase'
export default {
  data() {
    return {
      message: 'ログインができておりません',
    }
  },
  created() {
    firebase.auth().onAuthStateChanged((user) => {
      if (user) {
        this.message = 'ログイン済みです'
      }
    })
  },
  layout: 'PostDefault',
  methods: {

  },
}
</script>