<template>
  <div v-if="question &&  quesNo == curQuesNo-1">
    <h2>Question:</h2>
    <p>{{ question.question }}</p>
    <div v-if="question.type == 'objective'">
      <h2>Options:</h2>
      <ul>
        <li v-for="option in options">
          <input :id="option" type="radio" v-model="answer" :value="option" v-if="!isMultiple"/>
          <input :id="option" type="checkbox" v-model="answers" :value="option" v-if="isMultiple"/>
          <label :for="option">{{ option }}</label>
        </li>
      </ul>
    </div>
    <div v-if="question.type=='descriptive'">
      <h2>Answer:</h2>
      <input type="text" v-model="answers" />
    </div>
  </div>
</template>

<script>
export default {
  data: () => ({
    answers: [],
    answer: {},
    timer: undefined
  }),
  props: ['question', 'curQuesNo', 'oldAnswer', 'quesNo','allowDontKnow'],
  computed: {
    options(){
      var options = this.question.options
      if(parseInt(this.allowDontKnow))
      {
        options.push("I Don't Know")
      }
      return options
    },
    isMultiple(){
      return JSON.parse(this.question.answer).length > 1
    }
  },
  mounted(){
    if(!this.answers.length && this.oldAnswer){
      this.answers = this.oldAnswer
      if(this.answers.length == 1){
        this.answer = this.answers[0]
      }
    }
  },
  watch: {
    answers: function(val){
      clearTimeout(this.timer)
      var that = this
      this.timer = setTimeout(function(){
        that.$emit('answered', val, that.question.id)
      }, 700)
    },
    question: function(val){
      this.answers = []
    },
    answer: function(val){
      this.answers = [val]
    }
  }
}
</script>
