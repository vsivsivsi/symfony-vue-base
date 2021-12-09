import VueRouter from 'vue-router';
import Vue from "vue";
import Home from "@/components/Home";
import Catalog from "@/components/catalog/Catalog";
import Detail from "@/components/catalog/products/detail"

Vue.use(VueRouter);

const router = new VueRouter({
  routes: [
    { path: '/', component: Home },
    { path: '/catalog/', component: Catalog },
    { path: '/catalog/:id', component: Detail, props: true },
  ],
});

export default router;