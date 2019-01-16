<template>
  <div class="ongoing-exam-box">
    <div class="container">
      <div class="question-time-bar">
        <div class="question-number">Question: {{ curQuesNo }} of {{ exam.total_no_of_questions }}</div>
        <div class="time-remaining">
          <span class="time-remaining-label">Time remaining:</span>
          <span class="time-remaining-count">{{ remainingTime }} <span>minutes</span></span>
        </div>
        <div class="progress-bar"></div>
      </div>
      <div class="question-list">
        <question
        v-for="(question,key) in exam.questions"
        :question="question"
        :allowDontKnow="exam.allow_dont_know"
        :key="key"
        :quesNo="key"
        :curQuesNo="curQuesNo"
        :oldAnswer="answers[question.id]"
        v-on:answered="answered"
        ></question>
        <div class="next-question-btn">
          <a v-if="hasPrevious" href="" @click.prevent="previous">Previous Question</a>
          <a v-if="hasNext" href="" @click.prevent="next">Next Question</a>
          <a v-if="!hasNext" href="" @click.prevent="finish">Finish</a>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import Question from '@/components/Question'
export default {
  data: () => ({
    exam: {},
    curQuesNo: undefined,
    remaining: 0,
    answers: {},
    x: undefined,
    y: undefined
  }),
  computed: {
    remainingTime(){
      var hour = Math.floor(this.remaining/3600)
      var min = Math.floor((this.remaining % 3600)/60)
      var sec = this.remaining % 60
      var str = String("0" + hour).slice(-2)
      str += ":"+String("0" + min).slice(-2)
      str += ":"+String("0" + sec).slice(-2)
      return str
    },
    hasPrevious(){
      return this.curQuesNo != 1
    },
    hasNext(){
      return this.curQuesNo < this.exam.total_no_of_questions
    },
  },
  mounted() {
    var examId = this.$route.params.id
    var that = this
    this.$http.get('exams/take/' + examId)
    .then(function(response){
      that.exam = response.data
      if(parseInt(that.exam.pivot.status_id) != 3 && parseInt(that.exam.pivot.status_id) != 4){
          that.$router.push({
            name: 'ExamResult',
            params: {
              id: that.exam.pivot.id,
            }
          })
      }else{
        that.curQuesNo = that.exam.curQuesNo
        that.remaining = response.data.remaining
        if(that.exam.pivot.questions && that.exam.type=='objective'){
          that.exam.pivot.questions.forEach(function(question){
            that.answers[question.id] = JSON.parse(question.pivot.answer)
          })
        }
        that.x = setInterval(function(){
          if(that.remaining <= 0){
            clearInterval(that.x)
            that.finish()
          }
          that.remaining--
        }, 1000)
        that.y = setInterval(function(){
          if(that.remaining <= 0){
            clearInterval(that.y)
            that.finish()
          }
          that.$http.post('exams/set-last-active-time/' + that.exam.pivot.id)
        }, 10000)
      }
    })
  },
  methods: {
    answered(answer, quesId){
      this.answers[quesId] = answer
      var question = this.exam.questions[this.curQuesNo - 1]
      var that = this
      this.$http.post('exams/answer/' + that.exam.pivot.id, {
        question_id: question.id,
        answer: that.answers[question.id],
        curQuesNo: that.curQuesNo
      })
    },
    next(){
      var question = this.exam.questions[this.curQuesNo - 1]
      if(this.answers[question.id]){
        if(this.curQuesNo < this.exam.total_no_of_questions){
          this.curQuesNo++
          var that = this
          this.$http.post('exams/set-cur-ques-no/' + that.exam.pivot.id, {
            curQuesNo: that.curQuesNo
          })
        }
      }else{
        alert('please answer')
      }
    },
    previous(){
      if(this.curQuesNo > 1){
        this.curQuesNo--
        var that = this
        this.$http.post('exams/set-cur-ques-no/' + that.exam.pivot.id, {
          curQuesNo: that.curQuesNo
        })
      }
    },
    finish(){
      var question = this.exam.questions[this.curQuesNo - 1]
      if(this.answers[question.id] || this.remaining <= 0){
        var that = this
        this.$api.post('exam-user/submit/'+ that.exam.pivot.id, {
          answers: that.answers
        }).then(function(){
          clearInterval(that.x)
          clearInterval(that.y)
          that.$router.push({
            name: 'ExamResult',
            params: {
              id: that.exam.pivot.id,
            }
          })
        })
      }else{
        alert('please answer')
      }
    }
  },
  components: {
    Question
  }
}
</script>
