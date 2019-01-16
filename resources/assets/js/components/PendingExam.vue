<template>
<v-layout>
  <v-flex xs12 sm6 offset-sm3>
    <v-card>
      <v-card-title primary-title>
        <div>
          <h3 class="headline mb-0">{{ exam.title }}</h3>
          <div>{{ exam.description }}</div>
        </div>
      </v-card-title>
      <v-card-actions>
        <v-spacer></v-spacer>
        <v-btn flat color="orange" @click="start">Start Exam</v-btn>
      </v-card-actions>
    </v-card>
  </v-flex>
</v-layout>
</template>
<script>
export default {
  methods: {
    start(){
      this.$router.push({
        name: 'ExamStart',
        params: {
          id: this.exam.id,
        }
      })
    }
  },
  props: ['exam']
}
</script>
