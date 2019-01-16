<template>
  <li>
    <span class="flag-icon" v-show="content.id != curContId"><img src="/img/flag-icon.png" alt=""></span>
    <span class="flag-icon" v-show="content.id == curContId"><img src="/img/content-open.png" alt=""></span>
    <router-link :to="{ name: 'ContentDetail', params: {contentId: content.id, content: content} }">{{ content.title }}</router-link>
    <span class="view-icon cursor-pointer" @click="toggleStatus(content.id, $event)" v-if="isAssigned">
      <img v-show="isComplete" src="/img/content-done.png" alt="">
      <img v-show="!isComplete" src="/img/view-icon.png" alt="">
    </span>
  </li>
</template>

<script>
export default {
  props: ['course', 'content', 'curContId', 'contentUsers'],
  computed: {
    isComplete(){
      var that = this
      var contUser = this.contentUsers.find(function(cu){
        return cu.content_id == that.content.id
      })
      return contUser ? contUser.status_id == 18 : false
    },
    isAssigned(){
      return this.course.course_users.length
      && (this.course.course_users[0].is_admin_assigned != 0
        || this.course.course_users[0].is_self_assigned != 0
      )
    }
  },
  methods: {
      toggleStatus(){
        if(this.course.course_users.length && this.course.course_users[0].status_id == 15){
          return
        }
      var that = this
      this.$api.patch('content-user/toggle-status/' + that.content.id)
      .then(function(response){
        that.$emit('toggledStatus', response.data)
      })
    }
  }
}
</script>
