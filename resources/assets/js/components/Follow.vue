<template>
  <div>
    <follow-header></follow-header>
    <router-view></router-view>
  </div>
</template>

<script>
import FollowHeader from '@/components/FollowHeader'
export default{
  components: {
    FollowHeader
  }
}
</script>
