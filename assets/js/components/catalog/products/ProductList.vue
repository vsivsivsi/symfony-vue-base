<template>


  <div class="container">

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
      <div class="col" v-for="product in products" :key="product.id">
        <div class="card shadow-sm">
          <img v-bind:src="'images/products/' + product.imageName">

          <div class="card-body">
            <p class="card-text">{{ product.description }}</p>
            <div class="d-flex justify-content-between align-items-center">
              <div class="btn-group">
                <button type="button" class="btn btn-sm btn-outline-secondary"><a :href="products/product.id">View</a></button>
                <button type="button" class="btn btn-sm btn-outline-secondary">Bue</button>
              </div>
              <small class="text-muted">9 mins</small>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</template>

<script>
  export default {
    name: "ProductList",
    props: {
      products: {
        type: Array,
      }
    }
  }
</script>

<style scoped>

</style>