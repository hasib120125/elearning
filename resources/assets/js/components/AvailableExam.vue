<template>
  <div class="available-exams-row">
    <h3>{{ exam.title }}</h3>
    <div class="exam-expiration-date">
      <p>Expiration Date: <span>{{ expiredAt }}</span> </p>
      <div class="exam-details">{{ exam.duration }} minutes <span class="separator">|</span> {{ exam.score }} marks <span class="separator">|</span> {{ exam.total_no_of_questions}} questions</div>
    </div>
    <div class="exam-left-days">
      <p class="left-days">{{ daysLeft }} left</p>
      <router-link :to="{ name: 'ExamStart', params: {id : exam.pivot.id, examId: exam.id  }}">{{ commandText }}</router-link>
    </div>
    <div class="clearfix"></div>
  </div>
</template>
<script>
import fecha from 'fecha'
export default{
  computed: {
    expiredAt(){
      return fecha.format(fecha.parse(this.exam.pivot.ended_at, 'YYYY-MM-DD HH:mm:ss'), 'MMM Do, YYYY h:mm a');
    },
    daysLeft(){
      var diff = fecha.parse(this.exam.pivot.ended_at, 'YYYY-MM-DD HH:mm:ss') - new Date()
      var days = parseInt(Math.floor(diff/84600000))
      if(days){
        return days + (days > 1 ? ' days' : ' day ')
      }
      var hours = parseInt(Math.floor((diff % 84600000)/3600000))
      return hours + (hours > 1 ? ' hours' : ' hour ')

    },
    commandText(){
      return this.exam.pivot.status_id == "3" ? "Take Test" : "Continue"
    }
  },
  props: ['exam'],
  methods: {
    start(){
      this.$router.push({
        name: 'ExamStart',
        params: {
          id: this.exam.id,
        }
      })
    }
  }
}
</script>
