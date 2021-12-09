<template>
  <div>
    <page-title :text="title"></page-title>
    <product-list :products="products"></product-list>
  </div>
</template>

<script>
  import ProductList from "./products/ProductList";
  import axios from 'axios';
  import PageTitle from "../layouts/PageTitle";

  export default {
    name: "CatalogComponent",
    components: {
      PageTitle,
      ProductList
    },
    data: () => (
        {
          title: 'Product list',
          products: []
        }
    ),
    created () {
      console.log("Created hook");
      this.getProducts();
    },
    methods: {
      async getProducts () {
        // this.products = [
        //
        //   {
        //     name: 'Product 1',
        //   },
        //   {
        //     name: 'Product 2',
        //   },
        //   {
        //     name: 'Product 3',
        //   },
        //
        // ];
        console.log('Products fetched');
        const response = await this.fetchProducts();
        console.log('response', response);
        this.products = response.data['hydra:member'];
        console.log('this.products', this.products);
        // response.then((response) => {
        //   console.log(response);
        //   return response.data['hydra:member'];
        // }, (reason => {
        //   console.log('Promise rejected with reason:', reason);
        // })).catch();
      },
      fetchProducts () {
        return axios({
          method: 'get',
          url: 'api/products'
        });
      }
    }
  }
</script>

<style scoped>

</style>