<template>
  <header>
    <div class="header">
      <div class="header-logo">
        <NuxtLink to="/">
          <img src="img/logo.png" class="header-logo-img">
        </NuxtLink>
      </div>
      <div class="header-nav">
        <ul class="header-list">
          <li><NuxtLink to="/register" class="header-item">新規登録</NuxtLink></li>
          <li><NuxtLink to="/login" class="header-item">ログイン</NuxtLink></li>
        </ul>
      </div>
    </div>
  </header>
</template>
<style scoped>
header{
  background-color: midnightblue;
}
.header{
  display: flex;
  justify-content: space-between;
}
.header-logo{
  height: 30px;
  margin: auto 0;
}
.header-logo-img{
  height: 100%;
}
.header-list{
  display: flex;
  justify-content: flex-end;
  list-style-type: none;
  margin-right: 10px;
}
.header-item{
  text-decoration: none;
    padding-left: 20px;
    color: aliceblue;
}
</style>
