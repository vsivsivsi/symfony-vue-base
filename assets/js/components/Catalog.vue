<template>

  <div>
    <page-title-component :text="title"></page-title-component>

    <product-list-component :products="products"></product-list-component>
  </div>
</template>

<script>
  import PageTitleComponent from './PageTitle';
  // import ProductListComponent from "./ProductList";
  import axios from 'axios';

  export default {
    name: "Catalog",
    components: {
      PageTitleComponent,
      // ProductListComponent
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