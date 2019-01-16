<template>
  <div class="exams-content-wrap">
      <available-exam-list
      :exams = "pendingExams"
      :noOfCompletedExams = "completedExams.length"
      ></available-exam-list>
      <completed-exam-list
      :exams = "completedExams"
      ></completed-exam-list>
      <div class="clearfix"></div>
    </div>
</template>
<script>
import AvailableExamList from '@/components/AvailableExamList'
import CompletedExamList from '@/components/CompletedExamList'
export default{
  data(){
    return {
      pendingExams: [],
      completedExams: []
    }
  },
  mounted(){
    var that = this
    this.$api.get('exams/pending-and-completed')
    .then(function(response) {
      that.pendingExams = response.data['pending']
      that.completedExams = response.data['completed']
    })
  },
  components: {
    AvailableExamList,
    CompletedExamList,
  }
}
</script>
