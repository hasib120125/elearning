import Vuex from 'vuex'
import Vue from 'vue'
import api from '@/http'

Vue.use(Vuex)

export default new Vuex.Store({
    state: {
      user: {},
      isFull: false,
      reloadCourses: false
    },
    mutations:{
      getUser(state, user){
        state.user = user
      },
      toggleFull(state, isFull){
        state.isFull = isFull
      },
      reloadCourses(state){
        state.reloadCourses = !state.reloadCourses
      }
    },
    actions: {
      getUser ({ commit }) {
        api.get('users/self')
        .then(function(response){
          commit('getUser', response.data)
        })
      },
      toggleFull({ commit }, data){
        commit('toggleFull', data.isFull)
      },
      reloadCourses({ commit }){
        commit('reloadCourses')
      }
    }

})
