<template>
  <div class="question-wrap">
    <div class="knowledge-test-title"><h1>{{ exam.title }}</h1></div>
    <div class="exam-information-wrap">
      <div class="container">
        <div class="exam-topic-col">
          <h2>Exam Description</h2>
          <p>{{ exam.description }}</p>
        </div>
        <div class="exam-info-col exam-info-col2">
          <h2>Exam Information</h2>
          <ul class="exam-info-list">
            <li>Exam Type: {{ exam.type == 'objective' ? 'Multiple Choice Questions (MCQ)' : 'Descriptive Questions' }}</li>
            <li>Duration: {{ exam.duration }} minutes</li>
            <li>Total Questions: {{ exam.total_no_of_questions }}</li>
            <li>Total Marks: {{ exam.score }}</li>
          </ul>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
    <div class="question-start">
      <h2 class="question-title">Question</h2>
      <div class="question-start-btn-wrap"><router-link :to="{ name: 'Exam', params: { id: examUserId } }" class="question-start-btn">{{ commandText }}</router-link></div>
    </div>
  </div>
</template>
<script>
export default {
  data: () => ({
    exam: {},
    examUserId: ''
  }),
  mounted() {
    this.examUserId = this.$route.params.id
    var that = this
    this.$http.get('exams/get-by-exam-user-id/' + that.examUserId)
    .then(function(response){
      that.exam = response.data
    })
  },
  computed: {
    commandText(){
      return this.exam.status_id == 3 ? 'START' : 'START'
    }
  },
  methods: {
    start(){
      this.$router.push({
        name: 'Exam',
        params: {
          id: this.exam.id,
        }
      })
    }
  }
}
</script>
