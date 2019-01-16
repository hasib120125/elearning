<template>
  <div class="follow-dashboard-wrap">
    <div class="robi-agent-wrap">
      <div class="agent-details-col">
        <div class="robi-agent-img" v-if="user.code">
          <img :src="'/img/profile/'+user.code+'.png'" alt="" />
        </div>
        <div class="robi-agent-details" v-if="user.name">
          <h2 class="robi-agent-name">{{ user.name }}</h2>
          <h4 class="robi-agent-email" v-if="user.email">{{ user.email }}</h4>
          <h4 class="robi-agent-phone" v-if="user.phone">{{ user.phone }}</h4>
          <h4 class="robi-agent-unit" v-if="user.unit">{{ user.unit.name }}</h4>
          <h4 class="robi-agent-department" v-if="user.department">{{ user.department.name }}</h4>
          <h4 class="robi-agent-division" v-if="user.division">{{ user.division.name }}</h4>
          <p class="robi-agent-assigned">ASSIGNED ({{ user.no_of_courses_assigned}})</p>
          <p class="robi-agent-ateended">ATEENDED ({{ user.no_of_courses_attended}})</p>
        </div>
        <div class="clearfix"></div>
      </div>
      <div class="agent-badge-col">
        <h2>LEARNER BADGE</h2>
        <img src="/img/agent-badge.png" alt="" />
      </div>
      <div class="agent-avgscore-col">
        <span class="avg-score">{{ user.score }}</span>
        <p>Score</p>
      </div>
      <div class="clearfix"></div>
    </div>
    <div class="robi-quiz-wrap">
      <h3>QuiZtat</h3>
      <div class="robi-quiz-score">
        <followstat
        v-for="(skill, index) in skills"
        :key="index"
        :index="index"
        :skill="skill">
        </followstat>
      </div>
    </div>
  </div>
</template>
<script>
import Followstat from '@/components/Followstat'
export default{
  data: function(){
    return {
      user: {},
      skills: []
    }
  },
  mounted() {
    var that = this
    this.$api.get('users/self-detail')
    .then(function(response){
      that.user = response.data
      that.skills = that.user.skills
    })
  },
  components: {
    Followstat
  }
}
</script>
<style>
.progress {
    text-align: center;
    margin: 0 auto;
    width: 200px;
    padding: 0 20px;
}
.progress-holder{
  display: inline-block;
}
.robi-quiz-score{
  text-align: center;
  margin: 0 auto;
}
.skill-name{
  color: #fff
}
.robi-agent-name{
  text-transform: capitalize;
}
</style>
