<template>
  <div class="header-wrap">
    <div class="container">
      <div class="logo-wrap">
        <a href="/" class="logo">
          <img src="/img/robi-airtel-logo.png" alt="" />
        </a>
        <span class="tag-text"><img src="/img/JanaOjana.png" alt="JANA OJANA" /></span>
      </div>
      <div class="header-right">
        <ul class="top-nav">
          <li><router-link :to="{ name: 'QuizHome' }">Home</router-link></li>
          <li :class="{active: elem == 'FollowHome'}" v-if="user.source == 1"><router-link :to="{ name: 'FollowHome' }">Classroom</router-link></li>
        </ul>
        <ul class="user-nav">
          <a href="javascript:void(0)" class="user-name"
          @click.prevent="isUserNavOpen = !isUserNavOpen"
          >{{ user.name }}</a>
          <ul class="dropdown-nav" :class="{open: isUserNavOpen }">
            <li v-if="user.is_admin"><a href="/admin-dashboard">Admin Panel</a></li>
            <li v-if="user.source != 1"><a href="#">Change Password</a></li>
            <li><a href="#" @click.prevent="logout">Logout</a></li>
          </ul>
        </ul>
        <!-- <ul name="" id="">
          <li value="">{{ user.name }}</li>
          <li value="">Change Password</li>
          <li value="" @click.prevent="logout">Logout</li>
        </ul> -->
      </div>
      <div class="clearfix"></div>
    </div>
  </div>
</template>
<script>
export default{
  data: function(){
    return {
      isUserNavOpen: false,
      elem: this.$router.currentRoute.name,
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
  methods:{
    logout() {
      var app = this
      this.$http.post('/logout')
      .then(function(){
      }).catch(function(){
        window.location.reload()
      })
    }
  },
  watch:{
    $route (to){
      this.elem = to.name
    }
  },}
</script>
