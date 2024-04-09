import './bootstrap';
import { createApp } from 'vue';

// import { createRouter, createWebHistory } from 'vue-router'

import HomeCarousel from "./components/HomeCarousel.vue";
import ButtonConnect from "./components/ButtonConnect.vue";
import NavigationProducts from "./components/NavigationProducts.vue";
import Product from "./components/Product.vue";
import BasketButton from "./components/BasketButton.vue";
const app = createApp({});

// Vue.use(VueRouter);

// const routes = [
//     { path: '/product/:id', component: Product, name: 'product' },
// ];
//
// const router = createRouter({
//     history: createWebHistory(), // Use history mode for clean URLs
//     routes,
// });
//
// app.use(router);

app.component('basket-button', BasketButton);
app.component('carousel', HomeCarousel);
app.component('button-connect', ButtonConnect);
app.component('navigation-products', NavigationProducts);
app.component('product', Product);
app.mount('#app');



