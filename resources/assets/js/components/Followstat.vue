<template>
  <div  class="progress-holder">
    <div class="progress-text">
      <div class="progress-column progress-stat">
        <label class="progress-title"></label>
        <div class="stat-container stat-total">
          <label class="stat-title">Total Number of Courses:</label>
          <span class="stat-value">{{ skill.total_no_of_courses }}</span>
        </div>
        <div class="stat-container stat-complete">
          <label class="stat-title">Number of Courses Completed:</label>
          <span class="stat-value">{{ skill.no_of_completed_courses }}</span>
        </div>
        <div class="stat-container stat-incomplete">
          <label class="stat-title">Number of Incomplete Courses:</label>
          <span class="stat-value">{{ skill.no_of_incomplete_courses }}</span>
        </div>
      </div>
      <div class="progress-column completed-courses" v-if="skill.completed_courses.length">
        <label class="progress-title">Completed Courses</label>
        <ul class="completed-courses-list">
          <li class="completed-course-item" v-for="course in skill.completed_courses">{{ course}}</li>
        </ul>
      </div>
      <div class="progress-column progress-incomplete">
        <label class="progress-title">Incomplete Courses</label>
        <ul class="incomplete-courses-list">
          <li class="in-complete-course-item" v-for="course in skill.incomplete_courses">{{ course }}</li>
        </ul>
      </div>
    </div>
    <span class="skill-name">{{ skill.name }}</span>
    <div ref="progress" class="progress"></div>
  </div>
</template>
<script>
import ProgressBar from 'progressbar.js'
export default{
  props: ['skill'],
  mounted(){
    this.initProgressBar()
  },
  methods: {
    initProgressBar(){
      var that = this
      this.$nextTick(function(){
        var bar = new ProgressBar.Circle(that.$refs.progress, {
          color: '#fff',
          // This has to be the same size as the maximum width to
          // prevent clipping
          strokeWidth: 10,
          trailWidth: 2,
          trailColor: '#fff',
          easing: 'easeInOut',
          duration: 1400,
          text: {
            autoStyleContainer: true
          },
          from: { color: '#fff', width: 10 },
          to: { color: '#fff', width: 10 },
          // Set default step function for all animate calls
          step: function(state, circle) {
            circle.path.setAttribute('stroke', state.color);
            circle.path.setAttribute('stroke-width', state.width);

            var value = Math.round(circle.value() * 100);
            if (value === 0) {
              circle.setText('0%');
            } else {
              circle.setText(value + '%');
            }

          }
        })
        bar.text.style.fontFamily = '"Raleway", Helvetica, sans-serif'
        bar.text.style.fontSize = '2rem'
        bar.animate(that.skill.user_percentage >0 ? that.skill.user_percentage: 0)  // Number from 0.0 to 1.0
      })
    }
  }
}
</script>
