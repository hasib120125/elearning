import Vue from 'vue'
import App from '@/App.vue'
import router from '@/router'
import store from '@/store'
import http from '@/http'
import mux from '@/mux'

router.beforeEach((to, from, next) => {
  document.title = to.meta.title
  next()
})

new Vue({
  el: '#app',
  router,
  store,
  http,
  mux,
  components: { App },
  template: '<App/>'
})
