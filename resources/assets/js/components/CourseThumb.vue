<template>
    <div class="slider-item cursor-pointer">
      <div class="slider-item-thumb" @click="goToCourse"><img src="/img/video-img.png" alt="" /></div>
      <h3 @click="goToCourse">{{course.name}}</h3>
      <span class="release-date">{{ startedAt }}</span>
      <div class="action-buttons">
        <button v-if="listType && listType=='fav'" @click="removeFromPlaylist">Remove from playlist</button>
      </div>
    </div>
</template>
<script>
import fecha from 'fecha'
export default {
  props: ['course', 'listType'],
  computed: {
    startedAt(){
      return fecha.format(fecha.parse(this.course.started_at, 'YYYY-MM-DD HH:mm:ss'), 'MMMM Do, YYYY');
    }
  },
  methods: {
    goToCourse(){
      var that = this
      this.$router.push({
        name: 'CourseDetail',
        params: {
          id: that.course.id,
          course: that.course
        }
      })
    },
    removeFromPlaylist(){
      var that = this
      this.$api.patch('course-user/'+this.course.course_users[0].id, {
        is_favorite: false
      }).then(function(){
        that.$store.dispatch('reloadCourses')
      })
    }
  }
}
</script>
