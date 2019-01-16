<template>
  <div class="available-exams-col">
    <div class="title-bar"><h2>Available Exams</h2></div>
    <div class="available-exams-content">
      <available-exam
      v-for="(exam, index) in exams"
      v-bind:exam="exam"
      v-bind:index="index"
      v-bind:key="exam.pivot.id"
      ></available-exam>
      <div class="no-exams-holder" v-if="!exams.length && noOfCompletedExams">
        <div class="no-exams-found">
          <div class="no-exams-congat">
            Congratulation!!!
          </div>
          <div class="no-exams-text">
            You have finished all your pending exams.
          </div>
        </div>
        <div class="no-exams-image">
          <img src="/img/no-exams.gif" />
        </div>
      </div>

      <div class="no-exams-found" v-if="!exams.length && !noOfCompletedExams">
        You are not assigned any exams yet.
      </div>
    </div>
  </div>
</template>

<script>
import AvailableExam from '@/components/AvailableExam'
export default {
  props: ['exams', 'noOfCompletedExams'],
  components: {
    AvailableExam
  }
}
</script>
