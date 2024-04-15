<template>
    <div class="product mt-3 " v-for="product in products">
        <img :src="'/storage/' + product.preview_image" alt="фото товару" class="img-fluid">
        <div class="name">{{ product.title }}</div>
        <div class="price">{{ product.price }}₴</div>
        <i class="fa-regular fa-circle-xmark destroy-basket-item"></i>
    </div>
</template>

<script>
export default {
    name: "Cart",
    mounted() {
      this.getCartProducts()
    },
    data(){
        return {
            mobileNavBasket: null,
            products: [],
        };
    },
    methods:{
        toggleMobileNavBasket(){
            this.mobileNavBasket = !this.mobileNavBasket;
        },
        getCartProducts(){
            this.products = JSON.parse(localStorage.getItem('cart'))
            console.log(this.products);
        }
    }
}
</script>

<style scoped>

i{
    cursor: pointer;
    font-size: 35px;
    transition: 0.8s ease all;
}

.destroy-basket-item{
    margin-left: 100px;
}

.cart .close {
    float: right;
    cursor: pointer;
}
.cart .product {
    display: flex;
    align-items: center;
    padding: 10px;
    border-bottom: 1px solid #ccc;
}
.cart .product img {
    width: 50px;
    height: 50px;
    margin-right: 10px;
}
.cart .product .name {
    font-weight: bold;
}
.cart .product .price {
    margin-left: 80px;
    font-size: 20px;
}

.name{
    font-size: 22px;
    width: 100px;
}
</style>
