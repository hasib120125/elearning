<template>
  <div class="courses-video-prev-col" v-if="topic">
    <div class="title-bar"><h2>{{ topic.name }}</h2></div>
    <div class="courses-video-prev-tab">
      <ul class="tab-head">
        <li><a :class="{active: tab== 'description'}" href="javascript:void(0)" @click.prevent="tab = 'description'">Description</a></li>
        <li><a :class="{active: tab== 'others'}" href="javascript:void(0)" @click.prevent="tab = 'others'">Other Info</a></li>
      </ul>
      <div class="tab-content">
        <div class="tab-body tab1" :class="{active: tab== 'description'}" >
          <p>{{ topic.description }}</p>
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
      topic: undefined
    }
  },
  mounted(){
    if(this.$route.params.topic){
      this.topic = this.$route.params.topic
    }else{
      var that = this
      this.$api.get('topics/' + that.$route.params.topicId)
      .then(function(response){
        that.topic = response.data
      })
    }
  }
}
</script>
