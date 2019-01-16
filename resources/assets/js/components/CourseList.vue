<template>
  <div class="courses-wrap">
    <div class="courses-video-list-col">
      <ul class="tab-head">
        <li>
          <a
          :class="{ active: tab == 'new'}"
          href="#"
          @click.prevent="tab = 'new'"
          >New</a>
        </li>
        <li>
          <a
          :class="{ active: tab == 'popular'}"
          href="#"
          @click.prevent="tab = 'popular'"
          >Popular</a>
        </li>
        <li>
          <a
          :class="{ active: tab == 'top'}"
          href="#"
          @click.prevent="tab = 'top'"
          >Topchart</a>
        </li>
      </ul>
      <div class="tab-content">
        <div class="tab-body" :class="{ active: tab == 'new' }">
          <course-tile
          v-for="course in newCourses"
          :course="course"
          :key="course.id"></course-tile>
        </div>
        <div class="tab-body" :class="{ active: tab == 'popular' }">
          <course-tile
          v-for="course in popCourses"
          :course="course"
          :key="course.id"></course-tile>
        </div>
        <div class="tab-body" :class="{ active: tab == 'top' }">
          <course-tile
          v-for="course in topCourses"
          :course="course"
          :key="course.id"></course-tile>
        </div>
      </div>
    </div>
    <div class="courses-slider-col">
      <div v-if="conCourses.length">
        <h2 class="courses-slider-title">Continue Courses</h2>
        <div class="courses-slider">
          <carousel class="owl-carousel owl-theme" :class="{thumb1:conCourses.length == 1, thumb2: conCourses.length == 2}" :navigationEnabled="true" :paginationEnabled="false" :perPage="3" :navigationPrevLabel="''":navigationNextLabel="''">
            <slide
            v-for="(course, index) in conCourses"
            :index="index"
            :key="course.id"
            ><course-thumb :index="index" :course="course"></course-thumb></slide>
          </carousel>
        </div>
      </div>
      <div v-if="assCourses.length">
        <h2 class="courses-slider-title">Assigned playlist</h2>
        <div class="courses-slider">
          <carousel class="owl-carousel owl-theme" :class="{thumb1:assCourses.length == 1, thumb2: assCourses.length == 2}" :navigationEnabled="true" :paginationEnabled="false" :perPage="3" :navigationPrevLabel="''":navigationNextLabel="''">
            <slide
            v-for="(course, index) in assCourses"
            :index="index"
            :key="course.id"
            ><course-thumb :index="index" :course="course"></course-thumb></slide>
          </carousel>
        </div>
      </div>
      <div v-if="favCourses.length">
        <h2 class="courses-slider-title">My playlist</h2>
        <div class="courses-slider">
          <carousel class="owl-carousel owl-theme" :class="{thumb1:favCourses.length == 1, thumb2: favCourses.length == 2}" :navigationEnabled="true" :paginationEnabled="false" :perPage="3" :navigationPrevLabel="''":navigationNextLabel="''">
            <slide
            v-for="(course, index) in favCourses"
            :index="index"
            :key="course.id"
            ><course-thumb
            :index="index"
            :course="course"
            :listType="'fav'"
            ></course-thumb></slide>
          </carousel>
        </div>
      </div>
    </div>
    <div class="clearfix"></div>
  </div>
</template>
<script>
import CourseThumb from '@/components/CourseThumb'
import CourseTile from '@/components/CourseTile'
import { Carousel, Slide } from 'vue-carousel';
export default{
  data() {
    return {
      tab: 'new',
      courses: [],
      courseUsers: [],
    }
  },
  computed:{
    reloadCourses(){
      return this.$store.state.reloadCourses
    },
    newCourses(){
      return this.courses
    },
    topCourses(){
      return this.courses.filter(function(course){
        return course.is_top != 0
      })
    },
    popCourses(){
      return this.courses.slice().sort(function(a, b){
        return a.no_of_users - b.no_of_users
      })
    },
    conCourses(){
      return this.courses.filter(function(course){
        if(course.course_users.length){
          return course.course_users[0].status_id == 14
        }else{
          return false
        }
      })
    },
    assCourses(){
      return this.courses.filter(function(course){
        if(course.course_users.length){
          return course.course_users[0].status_id == 13
        }else{
          return false
        }
      })
    },
    favCourses(){
      return this.courses.filter(function(course){
        if(course.course_users.length){
          return course.course_users[0].is_favorite != 0
        }else{
          return false
        }
      })
    }
  },
  watch: {
    reloadCourses(){
      this.getCourses()
    }
  },
  mounted(){
    this.getCourses()
  },
  methods:{
    getCourses(){
      var that = this
      this.$api.get('courses')
      .then(function(response){
        that.courses = response.data
      })
    }
  },
  components: {
    CourseThumb,
    CourseTile,
    Carousel,
    Slide,
  }
}
</script>
<style>
.slider-item img {
  width: 100%;
}
.slider-item{
  width:90%;
  margin: 0 auto;
}
.VueCarousel-navigation-button{
  background: url(/img/right-arrow.png) no-repeat scroll center center #FFFFFF !important;
  border-radius: 0;
  box-shadow: -4px 0 5px rgba(78, 79, 81, 0.9);
  height: 100px;
  margin: 0;
  position: absolute;
  right: -34px;
  top: 37% !important;
  width: 40px;
  z-index: 999;
}
.VueCarousel-navigation-prev{
  background-image: url(/img/left-arrow.png) !important;
  box-shadow: 4px 0 5px rgba(78, 79, 81, 0.9);
  left: 13px !important;
  right: auto;
}
.VueCarousel-navigation-next{
  right: 13px !important;
}
.VueCarousel-navigation--disabled{
  opacity: 1 !important;
}
.thumb1 .slider-item{
  width: 30%;
}
.thumb2 .slider-item{
  width: 60%;
}
</style>
