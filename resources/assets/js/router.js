import Vue from 'vue'
import Router from 'vue-router'
import Quiz from '@/components/Quiz'
import QuizHome from '@/components/QuizHome'
import Live from '@/components/Live'
import LiveClass from '@/components/LiveClass'
import Follow from '@/components/Follow'
import FollowHome from '@/components/FollowHome'
import PendingExamList from '@/components/PendingExamList'
import ExamStartPage from '@/components/ExamStartPage'
import ExamResult from '@/components/ExamResult'
import Exam from '@/components/Exam'
import Courses from '@/components/Courses'
import Course from '@/components/Course'
import CourseList from '@/components/CourseList'
import CourseDetail from '@/components/CourseDetail'
import TopicDetail from '@/components/TopicDetail'
import ContentDetail from '@/components/ContentDetail'

Vue.use(Router)

export default new Router({
  mode: 'history',
  routes: [
    {
      path: '/quiz',
      component: Quiz,
      children: [
        {
          path: '',
          name: 'QuizHome',
          component: QuizHome,
          meta: {
            title: 'Exam Dashboard'
          }
        },
          
        {
          path: 'examstart/:id',
          name: 'ExamStart',
          component: ExamStartPage,
          meta: {
            title: 'Start Exam'
          }
        },
        {
          path: 'exam-result/:id',
          name: 'ExamResult',
          component: ExamResult,
          meta: {
            title: 'Exam Result'
          }
        },
        {
          path: 'exam/:id',
          name: 'Exam',
          component: Exam,
          meta: {
            title: 'Exam'
          }
        },
      ]
    },

    {
      path: '/live',
      component: Live,
      children: [
        {
          path: '',
          name: 'LiveClass',
          component: LiveClass,
          meta: {
            title: 'Live Class'
          }
        },
      ]
    },

    {
      path: '/follow',
      component: Follow,
      children: [
        {
          path: '',
          name: 'FollowHome',
          component: FollowHome,
          meta: {
            title: 'Class Room'
          }
        },
        {
          path: 'courses',
          component: Courses,
          meta: {
            title: 'Courses'
          },
          children: [
            {
              path: '',
              name: 'CourseList',
              component: CourseList,
              meta: {
                title: 'List of Courses'
              },
            },
            {
              path: ':id',
              component: Course,
              meta: {
                title: 'Course'
              },
              children: [
                {
                  path: '',
                  name: 'CourseDetail',
                  component: CourseDetail,
                  meta: {
                    title: 'Course Detail'
                  },
                },
                {
                  path: 'topic/:topicId',
                  name: 'Topic',
                  component: TopicDetail,
                  meta: {
                    title: 'Topic Detail'
                  },
                },
                {
                  path: 'content/:contentId',
                  name: 'ContentDetail',
                  component: ContentDetail,
                  meta: {
                    title: 'Content Detail'
                  },
                }
              ]
            }
          ]
        },
      ]
    },
  ]
})
