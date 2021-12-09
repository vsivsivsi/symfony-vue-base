<template>
<div>

  <div class="row py-lg-5">
    <div class="col-lg-6 col-md-8 mx-auto">
      <h1 class="fw-light">{{text}}</h1>
    </div>
  </div>

</div>
</template>

<script>
  export default {
    name: "PageTitle",
    props: {
      text: {
        type: String,
      }
    }
  }
</script>

<style scoped>

</style>