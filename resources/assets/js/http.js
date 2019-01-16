import axios from 'axios'
import Vue from 'vue'

let csrf = document.head.querySelector('meta[name="csrf-token"]');
let passport = document.head.querySelector('meta[name="access-token"]');

export var http= Vue.prototype.$http = axios.create({
    baseURL: '/',
    headers: {
      'X-CSRF-TOKEN': csrf.content
    }
  })
export default Vue.prototype.$api = axios.create({
    baseURL: '/api',
    headers: {
      'AUTHORIZATION': 'Bearer ' + passport.content
    }
  })
