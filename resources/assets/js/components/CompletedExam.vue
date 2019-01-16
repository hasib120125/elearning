<template>
  <div class="completed-exams-row" @click.prevent="showResult">
    <div class="completed-exams-details">
      <h3>{{ exam.title }}</h3>
      <div class="completed-exams-date">{{ completedOn }} <span class="separator">|</span> {{ completedAt }}</div>
    </div>
    <div class="completed-exams-result">
      <p class="result-count">{{ state.score }}/{{ exam.score }}</p>
      <div class="result-status" :class="gradeClass">{{ state.grade }}</div>  
    </div>
    <div class="clearfix"></div>
  </div>
</template>
<script>
import fecha from 'fecha'
export default{
  computed: {
    completedOn(){
      return fecha.format(fecha.parse(this.exam.pivot.completed_at, 'YYYY-MM-DD HH:mm:ss'), 'MMMM Do, YYYY');
    },
    completedAt(){
      return fecha.format(fecha.parse(this.exam.pivot.completed_at, 'YYYY-MM-DD HH:mm:ss'), 'hh:mm a');
    },
    daysLeft(){
      var diff = fecha.parse(this.exam.pivot.ended_at, 'YYYY-MM-DD HH:mm:ss') - new Date()
      var days = parseInt(Math.floor(diff/84600000))
      //var hours = parseInt(Math.floor((diff % 84600000)/3600000))
      return days + (days > 1 ? ' days' : ' day ')
    },
    state(){
      return this.exam.pivot.state
    },
    gradeClass(){
      var gradeClass = {}
      if(this.state && this.state.grade){
        var key = this.state.grade.toLowerCase()
        gradeClass[key] = true
        return gradeClass
      }
    }
  },
  props: ['exam'],
  methods: {
    showResult(){
      this.$router.push({
        name: 'ExamResult',
        params: {
          id: this.exam.pivot.id,
        }
      })
    }
  }
}
</script>
<style lang="stylus">
  .completed-exams-row
    cursor pointer
</style>
