import Vuex from 'vuex'
import Vue from 'vue'
import api from '@/http'

Vue.use(Vuex)

export default new Vuex.Store({
    state: {
      user: {},
      isFull: false,
      reloadCourses: false,
      liveclass: {}
    },
    mutations:{
      getUser(state, user){
        state.user = user
      },
      getLiveclass(state, liveclass){
        state.liveclass = liveclass
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
      getLiveclass ({ commit }) {
        api.get('users/live-assigned')
        .then(function(response){
          commit('getLiveclass', response.data)
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
