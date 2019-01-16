<template>
  <div class="courses-video-prev-col" v-if="content" :class="{'is-full': isFull }">
    <div class="title-bar">
      <h2>{{ content.title }}
      <span class="pull-right cursor-pointer full-screen" @click="toggleFull">
        <img v-if="isFull" src="/img/minimize.png" alt="">
        <img v-if="!isFull" src="/img/maximize.png" alt="">
      </span>
      </h2>
    </div>
    <div class="courses-video-prev" :class="{'is-full': isFull }">
      <object v-if="content.file && content.file.extension=='pdf'" :data="'/content-files/download/'+content.file.id" width="100%" height="100%" type="application/pdf"></object>
      <iframe v-if="content.file && content.file.extension=='pptx'" :data="'/content-files/download/'+content.file.id" width="100%" height="100%"></iframe>
      <video v-if="content.file && content.file.extension=='mp4'" controls :src="'/content-files/download/'+content.file.id" width="100%" height="100%" :type="content.file.type"></video>
      <div v-if="!content.file"><h4>A text</h4></div>
    </div>
    <div class="courses-video-prev-tab">
      <ul class="tab-head">
        <li><a :class="{active: tab== 'description'}" href="javascript:void(0)" @click.prevent="tab = 'description'">Description</a></li>
        <li><a :class="{active: tab== 'exercise'}" href="javascript:void(0)" @click.prevent="tab = 'exercise'">Exercise File</a></li>
        <li><a :class="{active: tab== 'faq'}" href="javascript:void(0)" @click.prevent="tab = 'faq'">FAQ</a></li>
      </ul>
      <div class="tab-content">
        <div class="tab-body tab1" :class="{active: tab== 'description'}" >
          <p>{{ content.description }}</p>
        </div>
        <div class="tab-body tab2" :class="{active: tab== 'exercise'}" >
          <p></p>
        </div>
        <div class="tab-body tab3" :class="{active: tab== 'faq'}" >
          <p></p>
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
      isFull: false,
      content: undefined
    }
  },
  mounted(){
    if(this.$route.params.content){
      this.content = this.$route.params.content
    }else{
      var that = this
      this.$api.get('contents/' + that.$route.params.contentId)
      .then(function(response){
        that.content = response.data
      })
    }
  },
  methods: {
    toggleFull(){
      if(this.isFull){
        this.isFull = false
      }else{
        this.isFull = true
      }
      this.$store.dispatch('toggleFull', { isFull: this.isFull})
    }
  }
}
</script>
<style>
.courses-video-prev{
  height: 400px;
}
.courses-video-prev.is-full{
  height: 100vh;
}
.courses-video-prev-col.is-full{
  width: 100vw;
  margin-top: -67px;
}
</style>
