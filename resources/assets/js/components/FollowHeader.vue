<template>
  <div class="header-wrap follow-header">
    <div class="container">
      <div class="logo-wrap">
        <a href="/" class="logo">
          <img src="/img/robi-airtel-logo.png" alt="" />
        </a>
        <span class="tag-text"><img src="/img/classroom.png" alt="Classroom" /></span>
      </div>
      <div class="header-right">
        <ul class="top-nav">
          <li :class="{active: elem == 'FollowHome'}"><router-link :to="{ name: 'FollowHome' }">Dashboard</router-link></li>
          <li :class="{active: elem == 'CourseList'}"><router-link :to="{ name: 'CourseList'}">Courses</router-link></li>
          <li :class="{active: elem == 'QuizHome'}"><router-link :to="{ name: 'QuizHome'}">Exam Hall</router-link></li>
          <li :class="{active: elem == 'LiveClass'}"><router-link :to="{ name: 'LiveClass'}">Live Class</router-link></li>
        </ul>
        <ul class="user-nav">
          <a href="javascript:void(0)" class="user-name" @click.prevent="isUserNavOpen = !isUserNavOpen">{{ user.name }}</a>
          <ul class="dropdown-nav" :class="{open: isUserNavOpen}">
            <li v-if="user.source != 1"><a href="#">Change Password</a></li>
            <li><a href="#" @click.prevent="logout">Logout</a></li>
          </ul>
        </ul>
      </div>
      <div class="clearfix"></div>
    </div>
  </div>
</template>
<script>
export default {
  data: function(){
    return {
      elem: this.$router.currentRoute.name,
      isUserNavOpen: false
    }
  },
  computed: {
    user() {
      return this.$store.state.user
    }
  },
  mounted () {
    this.$store.dispatch('getUser')
  },
  watch:{
    $route (to){
      this.elem = to.name
    }
  },
  methods:{
    logout() {
      var app = this
      this.$http.post('/logout')
      .then(function(){
      }).catch(function(){
        window.location.reload()
      })
    }
  }
}
</script>
