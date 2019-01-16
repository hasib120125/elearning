<template>
  <div class="completed-exams-col">
    <div class="title-bar">
      <h2>Completed Exams</h2>
    </div>
    <div class="completed-exams-content">
      <completed-exam
        v-for="(exam, index) in exams"
        v-bind:exam="exam"
        v-bind:index="index"
        v-bind:key="exam.pivot.id"
      ></completed-exam>
      <div v-if="!exams.length" class="no-exams-found">No Complete exams</div>
    </div>

  </div>
</template>
<script>
import CompletedExam from '@/components/CompletedExam'
export default {
  props: ['exams'],
  components: {
    CompletedExam
  }
}
</script>
