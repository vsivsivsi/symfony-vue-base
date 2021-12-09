<template>
  <div class="container">
    <div class="text-center my-3 py-3">
      <div class="rounded-0 border-0">
        <div class="p-0 overflow-hidden shadow">
          <div class="row align-items-start">
            <div class="col-lg-6 p-lg-6">
              <div class="d-block h-100 ng-center">

              </div>
            </div>
            <div class="col-lg-6 p-lg-6">
              <div class="p-5 my-md-4">

                <ul class="list-inline mb-2">
                  <li class="list-inline-item m-0">&starf;</li>
                  <li class="list-inline-item m-0">&starf;</li>
                  <li class="list-inline-item m-0">&starf;</li>
                  <li class="list-inline-item m-0">&starf;</li>
                  <li class="list-inline-item m-0">&starf;</li>
                </ul>

                <h2 class="h5 text-uppercase">{{ this.product.name }}</h2>
                <ul class="list-inline mb-4">
                  <li class="list-inline-item me-3">{{ this.product.price }}</li>
                  <li class="list-inline-item me-3">{{ this.product.category.name }}</li>
                  <li class="list-inline-item me-3">{{ this.product.brand.name }}</li>
                </ul>
                <p class="mb-4">{{ this.product.description }}</p>
                <ul class="list-inline mb-4">
                  <li class="list-inline-item"><strong>Quantity: </strong></li>
                  <li class="list-inline-item">-</li>
                  <li class="list-inline-item">1</li>
                  <li class="list-inline-item">+</li>
                  <li class="list-inline-item"><a class="btn btn-primary" href="#">Add to cart</a></li>
                </ul>
                <a class="p-0" href="#">Add to wish list</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  import PageTitle from "../../layouts/PageTitle";
  import axios from "axios";
  import NavbarComponent from "../../layouts/navbar";

  export default {
    name: "ProductDetails",
    components: { NavbarComponent, PageTitle },
    data: () => (
        {
          product: {
            name: String,
            price: String,
            description: String,
            imageName: String,
            brand: {
              name: String
            },
            category: {
              name: String
            },
          },
        }
    ),
    props: [
      'id',

    ],
    mounted () {
      console.log('Mounted hook');
      console.log('id', this.id);

      this.getProduct()
    },
    methods: {
      async getProduct () {
        const response = await this.fetchProduct(this.id);
        this.product = response.data;
        console.log('this.product', this.product)
      },
      fetchProduct (id) {
        console.log('fetchProduct:id', id);
        return axios.get(`api/products/${id}`
        );
      },
    }
  }
</script>

<style scoped>

</style>