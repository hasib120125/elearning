<template>
  <div class="courses-video-list">
    <div class="video-col cursor-pointer" @click="goToCourse"><img src="/img/video-img.png" alt="" /></div>
    <div class="video-content-col">
      <h3 @click="goToCourse" class="cursor-pointer">{{ course.name }}</h3>
      <p @click="goToCourse">{{ course.description }} </p>
      <div class="video-details">
        <span>{{ duration }}</span>
        <span class="separator">|</span>
        <span>{{course.difficulty.name }}</span>
        <span class="separator">|</span>
        <span>{{ since }}</span>
        <span v-if="isComplete"> | Completed</span>
        </div>
      <div class="action-buttons">
        <button v-if="!course.user_is_favorite || course.user_is_favorite == '0'" @click="addToPlaylist">Add to playlist</button>
      </div>
    </div>
    <div class="clearfix"></div>
  </div>
</template>
<script>
import fecha from 'fecha'
export default{
  props: ['course'],
  computed : {
    duration(){
      var d = this.course.duration[0]
      var h = this.course.duration[1]
      var m = this.course.duration[2]
      var str = ''
      if(d){
        str += d + 'd '
      }
      if(h){
        str += h + 'h '
      }
      if(m){
        str += m + 'm'
      }
      return str
    },
    since(){
      var start = fecha.parse(this.course.started_at, 'YYYY-MM-DD HH:mm:ss');
      var now = new Date();
      var timeDiff = Math.abs(now - start);
      var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24));
      return diffDays + (diffDays >1 ? ' days' : ' day') + ' ago'
    },
    isComplete(){
      return this.course.course_users.length && this.course.course_users[0].status_id == 15
    }
  },
  methods: {
    addToPlaylist(){
      var that = this
      this.$api.patch('course-user/by-course-id/'+this.course.id, {
        is_favorite: true
      }).then(function(){
        that.$store.dispatch('reloadCourses')
      })
    },
    goToCourse(){
      var that = this
      this.$router.push({
        name: 'CourseDetail',
        params: {
          id: that.course.id,
          course: that.course
        }
      })
    }
  }
}
</script>
