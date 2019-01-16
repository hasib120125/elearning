

<template>
<v-list subheader>
  <v-subheader>Available Exams</v-subheader>
  <pending-exam
  v-for="(exam, index) in exams"
  v-bind:exam="exam"
  v-bind:index="index"
  v-bind:key="exam.id"
  ></pending-exam>
</v-list>
</template>

<script>
import PendingExam from '@/components/PendingExam'
export default {
  data: () => ({
    exams: []
  }),
  mounted() {
    var that = this
    this.$http.get('exams/pending')
      .then(function(response) {
        that.exams = response.data
      })
  },
  components: {
    PendingExam
  }
}
</script>
