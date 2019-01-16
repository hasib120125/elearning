<template>
  <div class="courses-wrap">
    <router-view :key="$route.params.topicId +''+ $route.params.contentId"></router-view>
    <div class="courses-content-col" v-if="course" :class="{'is-full' : isFull}">
      <div class="title-bar">
        <router-link :to="{ name: 'CourseDetail', params: {id: course.id, course: course}}"><h2>{{ course.name }}</h2></router-link>
        <span class="search-btn"><img src="/img/search-icon.png" alt=""></span>
      </div>
      <div class="courses-content-wrap">
        <div class="courses-content-box courses-content-box1" 
          v-for="(topic, key) in course.topics"
          :key="key"
        >
          <h3 class="cursor-pointer" @click="goToTopic(topic)">{{ topic.name }}</h3>
          <ul class="courses-content-list">
            <content-block
              v-for="(content, index) in topic.contents"
              :content="content"
              :course="course"
              :curContId="curContId"
              :contentUsers="contentUsers"
              @toggledStatus="contStatToggled"
              :key="content.id"
              :index="index">
            </content-block>
          </ul>
        </div>
      </div>
    </div>
    <div class="clearfix"></div>
    <alert-modal v-if="showStartModal" class="alert-modal">
      <h3 slot="header">Start Course</h3>
      <p slot="body">Do you want to start the course?</p>
      <div slot="footer">
        <button @click="startCourse">Yes</button>
        <button @click="closeModal">No</button>
      </div>
    </alert-modal>
    <alert-modal v-if="showFinishModal" class="success-modal">
      <h3 slot="header">Finish Course</h3>
      <div slot="body">
        <p class="congrat-text">Congratulation! You have completed all the contents of the course</p>
        <p class="exam-link" v-if="examUser">There is an exam associated to this course. click below</p>
        <p v-if="examUser"><router-link :to="{ name: 'ExamStart', params: {id : examUser.id, examId: examUser.exam.id  }}">{{ examUser.exam.title }}</router-link></p>
      </div>
      <div slot="footer">
        <button @click="finishCourse">Complete the course</button>
      </div>
    </alert-modal>
  </div>
</template>
<script>
import Content from '@/components/Content.vue'
import AlertModal from '@/components/AlertModal'
export default {
  data: function(){
    return {
      examUser: undefined,
      course: undefined,
      courseUser: undefined,
      contentUsers: [],
      showStartModal: false,
      showFinishModal: false,
      curContId: this.$router.currentRoute.params.contentId,
    }
  },
  computed: {
    isFull(){
      return this.$store.state.isFull
    },
  },
  mounted(){
    var that = this
    if(this.$route.params.course){
      this.course = this.$route.params.course
      this.courseUser = this.course.course_users.length ? this.course.course_users[0]:undefined
      this.checkStatus()
    }else{
      this.loadCourse()
    }
    this.$api.get('content-user/by-course/' + that.$route.params.id)
    .then(function(response){
      that.contentUsers = response.data
    })
  },
  methods: {
    goToTopic(topic){
      this.$router.push({ name: 'Topic', params: { topicId: topic.id, topic: topic}})
    },
    isComplete(contentId){
        var cont = this.contentUsers.find(function(contUser){
          return contUser.content_id == contentId
        })
        return cont ? cont.status_id == 18 : false
    },
    contStatToggled(newContUser){
        var oldContUserIndex = this.contentUsers.findIndex(function(contUser){
          return contUser.id == newContUser.id
        })
        if(oldContUserIndex >= 0){
          this.contentUsers[oldContUserIndex].status_id = newContUser.status_id
        }else{
          this.contentUsers.push(newContUser)
        }
        if(newContUser.no_of_incomplete_contents == 0){
          var that = this
          this.$api.patch('course-user/' + this.courseUser.id, {
            status_id: 15,
          }).then(function(response){
            if(response.data){
              that.examUser = response.data
            }
            that.showFinishModal = true
            that.loadCourse()
          })
        }
    },
    checkStatus(){
        if(!this.courseUser || this.courseUser.status_id == 20){
          this.showStartModal = true
        }else if(this.courseUser.is_admin_assigned && this.courseUser.status_id == 13){
            this.$api.patch('course-user/' + this.courseUser.id, {
              status_id: 14,
            })
        }else{
          this.showStartModal = false
        }
    },

    closeModal(){
      this.showStartModal = false
    },
    startCourse(){
      var that = this
      this.$api.post('courses/self-assign/' + this.course.id)
      .then(function(){
        that.loadCourse()
      })
    },
    finishCourse(){
        this.showFinishModal = false
    },
    loadCourse(){
      var that = this
      this.$api.get('courses/' + that.$route.params.id)
      .then(function(response){
        that.course = response.data
        that.courseUser = that.course.course_users.length ? that.course.course_users[0]:undefined
        that.checkStatus()
      })
    },
  },
  watch: {
    $route(to){
      this.curContId = to.params.contentId
    }
  },
  components:{
    'content-block' : Content,
    'alert-modal' : AlertModal
  }
}
</script>
<style>
.courses-content-col.is-full{
  display:none;
}
</style>
