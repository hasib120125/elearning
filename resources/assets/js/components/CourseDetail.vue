<template>
  <div class="courses-video-prev-col" v-if="course">
    <div class="title-bar"><h2>{{ course.name }}</h2></div>
    <div class="courses-video-prev-tab">
      <ul class="tab-head">
        <li><a :class="{active: tab== 'description'}" href="javascript:void(0)" @click.prevent="tab = 'description'">Description</a></li>
        <li><a :class="{active: tab== 'others'}" href="javascript:void(0)" @click.prevent="tab = 'others'">Other Info</a></li>
      </ul>
      <div class="tab-content">
        <div class="tab-body tab1" :class="{active: tab == 'description'}" >
          <p>{{ course.description }}</p>
        </div>
        <div class="tab-body tab2" :class="{active: tab == 'others'}" >
          <ul>
            <li>
              Start Date: {{ course.started_at}}
            </li>
            <li>
              End Date: {{ course.ended_at}}
            </li>
            <li>
              Duration: {{ duration}}
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default{
  data: function(){
    return {
      tab: 'description',
      course: undefined,
      courseUser: undefined,
      showModal: false,
    }
  },
  computed : {
    duration(){
      var d = this.course.duration[0]
      var h = this.course.duration[1]
      var m = this.course.duration[2]
      var str = ''
      if(d){
        str += d + 'd '
      }
      if(h){
        str += h + 'h '
      }
      if(m){
        str += m + 'm'
      }
      return str
    },
  },
  mounted(){
    if(this.$route.params.course){
      this.course = this.$route.params.course
      this.courseUser = this.course.course_users.length ? this.course.course_users[0] : undefined
    }else{
      this.loadCourse()
    }
  },
  methods: {
    loadCourse(){
      var that = this
      this.$api.get('courses/' + that.$route.params.id)
      .then(function(response){
        that.course = response.data
        that.courseUser = that.course.course_users.length ? that.course.course_users[0] : undefined
      })
    }
  },

}
</script>
