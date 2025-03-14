<template>
  <div v-for="widget in widgets" :id="widget.slug" :key="widget.slug" v-html="widget.html_code"></div>
</template>

<script>
export default {
  data() {
      return {
          widgets: []
      };
  },
  mounted() {
      this.loadWidgets();
  },
  methods: {
      loadWidgets() {
          Nova.request()
              .get('/nova-vendor/opscale-co/nova-widgets/widgets') 
              .then(response => {
                  this.widgets = response.data;
              })
              .catch(error => {
                  console.error("Error loading widgets:", error);
              });
      }
  }
}
</script>

<style>
/* Scoped Styles */
</style>
