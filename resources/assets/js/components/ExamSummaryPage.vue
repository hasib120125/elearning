<template>
  <v-layout row wrap>
    <v-flex xs12 sm10 offset-sm1>
      <v-card>
        <v-card-title primary-title>
          <v-flex xs12>
            <h3 class="headline mb-2">{{ exam.title }}</h3>
            <v-divider></v-divider>
          </v-flex>
          <v-layout row wrap>
            <v-flex xs12 sm6 mt-2>
              <v-layout row wrap>
                <v-flex d-flex xs12 text-xs-center>
                  <h4>Result Summary</h4>
                </v-flex>
                <v-flex d-flex xs12>
                  <v-list v-if="exam">
                    <v-list-tile>
                      <v-list-tile-content>
                        <v-list-tile-title>Questions Answered</v-list-tile-title>
                      </v-list-tile-content>
                      <v-list-tile-action>{{ exam.quesAnswered }}</v-list-tile-action>
                    </v-list-tile>
                    <v-list-tile>
                      <v-list-tile-content>
                        <v-list-tile-title>Correct Answers</v-list-tile-title>
                      </v-list-tile-content>
                      <v-list-tile-action>{{ exam.correctAnswers }}</v-list-tile-action>
                    </v-list-tile>
                    <v-list-tile>
                      <v-list-tile-content>
                        <v-list-tile-title>Wrong Answers</v-list-tile-title>
                      </v-list-tile-content>
                      <v-list-tile-action>{{ exam.wrongAnswers }} minutes</v-list-tile-action>
                    </v-list-tile>
                    <v-list-tile>
                      <v-list-tile-content>
                        <v-list-tile-title>Score</v-list-tile-title>
                      </v-list-tile-content>
                      <v-list-tile-action>{{ exam.user_score }}</v-list-tile-action>
                    </v-list-tile>
                    <v-list-tile>
                      <v-list-tile-content>
                        <v-list-tile-title>Score(%)</v-list-tile-title>
                      </v-list-tile-content>
                      <v-list-tile-action>{{ exam.type=='objective' ? 'Objective' : 'Descriptive' }}</v-list-tile-action>
                    </v-list-tile>
                    <v-list-tile>
                      <v-list-tile-content>
                        <v-list-tile-title>Competency Level</v-list-tile-title>
                      </v-list-tile-content>
                      <v-list-tile-action>{{ exam.type=='objective' ? 'Objective' : 'Descriptive' }}</v-list-tile-action>
                    </v-list-tile>
                    <v-list-tile>
                      <v-list-tile-content>
                        <v-list-tile-title>Total Time Spent</v-list-tile-title>
                      </v-list-tile-content>
                      <v-list-tile-action>{{ exam.type=='objective' ? 'Objective' : 'Descriptive' }}</v-list-tile-action>
                    </v-list-tile>
                  </v-list>
                </v-flex>
              </v-layout>
            </v-flex>
            <v-flex xs12 sm6 mt-2>
              <v-layout row wrap>
                <v-flex xs12 text-xs-center>
                  <h4>Exam Details</h4>
                </v-flex>
                <v-flex>
                  <v-list v-if="exam.users">
                    <v-list-tile>
                      <v-list-tile-content>
                        <v-list-tile-title>Exam Type</v-list-tile-title>
                      </v-list-tile-content>
                      <v-list-tile-action>{{ exam.type == 'objective' ? 'Objective' : 'Descriptive' }}</v-list-tile-action>
                    </v-list-tile>
                    <v-list-tile>
                      <v-list-tile-content>
                        <v-list-tile-title>Duration</v-list-tile-title>
                      </v-list-tile-content>
                      <v-list-tile-action>{{ exam.duration }}</v-list-tile-action>
                    </v-list-tile>
                    <v-list-tile>
                      <v-list-tile-content>
                        <v-list-tile-title>Total Questions</v-list-tile-title>
                      </v-list-tile-content>
                      <v-list-tile-action>{{ exam.noOfQues }} minutes</v-list-tile-action>
                    </v-list-tile>
                    <v-list-tile>
                      <v-list-tile-content>
                        <v-list-tile-title>Total Marks</v-list-tile-title>
                      </v-list-tile-content>
                      <v-list-tile-action>{{ exam.score }}</v-list-tile-action>
                    </v-list-tile>
                  </v-list>
                </v-flex>
              </v-layout>
            </v-flex>
          </v-layout>
        </v-card-title>
      </v-card>
    </v-flex>
  </v-layout>
</template>
<script>
export default {
  data: () => ({
    exam: {}
  }),
  mounted() {
    var examId = this.$route.params.id
    var that = this
    this.$http.get('exams/finish/' + examId)
    .then(function(response){
      that.exam = response.data
    })
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
