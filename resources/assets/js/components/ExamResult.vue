<template>
  <div v-if="exam && state">
    <div class="question-wrap">
      <div class="knowledge-test-title"><h1>{{ exam.title }}</h1></div>
      <div class="exam-information-wrap">
        <div class="container">
          <div class="result-summary-col">
            <h2>Result Summary</h2>
            <ul class="result-summary-list">
              <li>Questions Answered: {{ state.no_of_questions_answered }}</li>
              <li>Correct Answers: {{ state.no_of_correct_answers }}</li>
              <li>Wrong Answers: {{ state.no_of_wrong_answers }}</li>
              <li>Correct Answer: (%){{ Math.round(state.no_of_correct_answers / exam.total_no_of_questions * 100) }}%</li>
              <li><span class="bold-red">Score: {{ state.score }}</span></li>
              <li><span class="bold-red">Score(%): {{ state.score / exam.score * 100}}%</span></li>
              <li>Total time spent: {{ state.time_spent}}</li>
            </ul>
            <div class="competency-level">Competency Level: {{ state.grade }}</div>
          </div>
          <div class="score-percentage-col">
            <div ref="progress" class="progress"></div>
            <span class="bold-red">Score: {{ state.score }}/{{ exam.score}}</span>
          </div>
          <div class="exam-info-col">
            <h2>Exam Information</h2>
            <ul class="exam-info-list">
              <li>Exam Type: {{ exam.type == 'objective' ? 'Multiple Choice Questions (MCQ)' : 'Descriptive Questions' }}</li>
              <li>Duration: {{ exam.duration }} minutes</li>
              <li>Total Questions: {{ exam.total_no_of_questions }}</li>
              <li>Total Marks: {{ exam.score }}</li>
              <li><button @click="downloadCertificate">Download Certificate</button></li>
            </ul>
          </div>
          <div class="clearfix"></div>
        </div>
      </div>
      <div class="question-row">
        <div class="container">
          <h2 class="question-title">Question</h2>
          <div class="question-item">
            <p>{{ question.question }}</p>
            <div class="question-item-ans" v-if="exam.type=='objective'">
              <div v-for="(option, key) in question.options"
              :key="key">
                <div href="#" :class="{'ans-yes': isCorrectAnswer(question, option), 'ans-no': isWrongAnswer(question, option)}" >
                  {{ getChar(key) + '. ' + option }}
                  <span class="ans-no" v-if="isCorrectAnswer(question, option) && isNotAnswered(question)">(not answered)</span>
                  <span class="ans-no" v-if="isCorrectAnswer(question, option) && isNotKnown(question)">(not known)</span>
                </div>
              </div>
            </div>
            <div class="question-item-ans" v-if="exam.type=='descriptive'">
              Your Answer: {{ answer }}
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="pagination-wrap">
      <a href="#" class="prev-ques pagi-btn" @click.prevent="prevQuestion">Previous Question</a>
      <ul class="pagination">
        <li v-for="(q,key) in questions"
        :class="{active: key == curQuesNo-1}"
        @click.prevent="curQuesNo = key + 1"
        :key="key">
          <a href="#">{{ key + 1}}</a>
        </li>
      </ul>
      <a href="#" class="next-ques pagi-btn" @click.prevent="nextQuestion">Next Question</a>
    </div>
  </div>
</template>
<script>
import ProgressBar from 'progressbar.js'
export default {
  data: () => ({
    exam: {},
    user: {},
    examUser: {},
    questions: [],
    curQuesNo: 1,
    answers: [],
    
  }),
  mounted() {
    var examId = this.$route.params.id
    var that = this
    this.$http.get('exams/finish/' + examId)
    .then(function(response){
      that.exam = response.data
      that.user = that.exam.users[0]
      that.examUser = that.user.pivot
      that.questions = that.exam.questions
      that.answers = that.user.pivot.questions
      that.initProgressBar()
    })
  },
  computed: {
    state(){
      return this.examUser.state
    },
    question(){
      return this.questions[this.curQuesNo - 1]
    },
    answer(){
      var that = this
      var answer = this.answers.find(function(answer){
        return answer.id == that.question.id
      })
      if(answer && answer.pivot.answer && answer.pivot.answer != "null"){
        return this.exam.type == 'objective' ? JSON.parse(answer.pivot.answer).join(", ") : answer.pivot.answer
      }
      return ''
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
    },
    getChar(key){
      return String.fromCharCode(key+65)
    },
    isCorrectAnswer(question, option){
      return JSON.parse(question.answer).includes(option)
    },
    isWrongAnswer(question, option){
      return this.exam.type != 'objective' || (!this.isCorrectAnswer(question, option) && this.answer.includes(option))
    },
    isNotAnswered(question){
      return (this.exam.type == 'objective' && !this.answer.length) || (this.exam.type == 'descriptive' && !this.answer)
    },
    isNotKnown(question){
      return (this.exam.type == 'objective' && this.answer.length && this.answer.includes("I Don't Know"))
    },
    nextQuestion(){
      if(this.curQuesNo < this.questions.length){
        this.curQuesNo++
      }
    },
    prevQuestion(){
      if(this.curQuesNo > 1){
        this.curQuesNo--
      }
    },
    initProgressBar(){
      var that = this
      this.$nextTick(function(){
        var bar = new ProgressBar.Circle(that.$refs.progress, {
          color: '#000',
          // This has to be the same size as the maximum width to
          // prevent clipping
          strokeWidth: 4,
          trailWidth: 1,
          trailColor: '#bbb',
          easing: 'easeInOut',
          duration: 1400,
          text: {
            autoStyleContainer: true
          },
          from: { color: '#C42C33', width: 5 },
          to: { color: '#C42C33', width: 5 },
          // Set default step function for all animate calls
          step: function(state, circle) {
            circle.path.setAttribute('stroke', state.color);
            circle.path.setAttribute('stroke-width', state.width);

            var value = Math.round(circle.value() * 100);
            if (value === 0) {
              circle.setText('');
            } else {
              circle.setText(value + '%');
            }

          }
        })
        bar.text.style.fontFamily = '"Raleway", Helvetica, sans-serif'
        bar.text.style.fontSize = '2rem'
        bar.animate(that.state.score / that.exam.score)  // Number from 0.0 to 1.0
      })
    },
    downloadCertificate () {
      window.open('/exam-user/certificate/' + this.examUser.id,'_newtab');
    }
  }
}
</script>
<style>
.progress {
  margin: 0 auto;
  width: 200px;
  height: 200px;
  position: relative;
}
.ans-no {
  color: red;
  font-weight: bold;
}
</style>
