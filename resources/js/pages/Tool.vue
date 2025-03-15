<template>
  <div v-for="widget in widgets" :id="widget.slug" :key="widget.slug" v-html="widget.html_code"></div>
</template>

<script>
export default {
props: {
    widgets: {
    type: Array,
    required: true,
    default: () => []
    }
}
}
</script>

<style>
/* Scoped Styles */
</style>