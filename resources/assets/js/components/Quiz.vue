<template>
  <div>
    <quiz-header></quiz-header>
    <router-view></router-view>
  </div>
</template>
<script>
import QuizHeader from '@/components/QuizHeader'
export default{
  components: {
    QuizHeader
  }
}
</script>
