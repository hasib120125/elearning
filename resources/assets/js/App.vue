<template>
  <div id="app">
    <router-view></router-view>
  </div>
</template>

<script>
export default {
  name: 'App',
  data: () => ({
    drawer: null,
  }),
  methods:{
    logout() {
      var app = this
      this.$http.post('/logout')
      .then(function(){
      }).catch(function(){
        window.location.reload()
      })
    },
  }
}
</script>
