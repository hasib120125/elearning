<template>
  <v-list dense>
    <v-list-tile @click="goto('Home')">
      <v-list-tile-action>
        <v-icon>fas fa-battery-empty</v-icon>
      </v-list-tile-action>
      <v-list-tile-content>
        <v-list-tile-title>Available Exams</v-list-tile-title>
      </v-list-tile-content>
    </v-list-tile>
    <v-list-tile @click="">
      <v-list-tile-action>
        <v-icon>fas fa-battery-full</v-icon>
      </v-list-tile-action>
      <v-list-tile-content>
        <v-list-tile-title>Completed Exams</v-list-tile-title>
      </v-list-tile-content>
    </v-list-tile>
    <v-list-tile @click="">
      <v-list-tile-action>
        <v-icon>fas fa-signal</v-icon>
      </v-list-tile-action>
      <v-list-tile-content>
        <v-list-tile-title>Report</v-list-tile-title>
      </v-list-tile-content>
    </v-list-tile>
  </v-list>
</template>
<script>
export default {
  methods: {
    goto(routerName){
      this.$router.push({ name: routerName })
    }
  }
}
</script>
