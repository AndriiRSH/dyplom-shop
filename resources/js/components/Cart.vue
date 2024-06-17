
<template>
    <div v-if="products && products.length">
        <form action="/checkout" method="POST">
            <div class="product mt-3 " v-for="(product, index) in products" :key="index">
                <img :src="'/storage/' + product.preview_image" alt="фото товару" class="img-fluid">
                <div class="name">{{ product.title }}</div>
                <div class="price">{{ product.price }}₴</div>
                <i @click.prevent="removeProduct(product.id)" class="fa-regular fa-circle-xmark destroy-basket-item"></i>
                <input type="hidden" :name="'products[' + index + '][id]'" :value="product.id">
            </div>
            <div style="display: flex; align-items: center; margin-top: 20px;">
                <h3 style="margin-right: 10px;">До сплати:</h3>
                <h4 style="margin-left: 245px;">{{ totalCost }}₴</h4>
            </div>
            <input type="hidden" name="_token" v-bind:value="csrf_token">
            <button type="submit" style="background-color: white; color: black; border: 1px solid black; padding: 10px 20px; width: 300px; margin-left: 70px; border-radius: 10px; text-decoration: none; display: inline-block; text-align: center">Оформити</button>
        </form>
    </div>
    <div v-else class="empty-cart">
        <h2>Ваша корзина порожня</h2>
        <p>Продовжуйте покупки</p>
    </div>
</template>

<script>
export default {
    name: "Cart",
    mounted() {
        this.myItem = this.totalCost;
        this.setCookie('cookieName', this.myItem, 7);
        this.products = JSON.parse(localStorage.getItem('cart'));
        this.getCartProducts();
    },
    data(){
        return {
            mobileNavBasket: null,
            products: [],
            myItem: '',
            showModal: false,
            cartShow: false,
            csrf_token: null,
        };
    },
    computed: {
        totalCost() {
            this.getCartProducts();
            return this.products.reduce((total, item) => total + item.price, 0);
        }
    },
    created() {
        this.fetchCsrfToken();
    },
    methods:{
        fetchCsrfToken() {
            this.csrf_token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        },
        setCookie(name,value,days) {
            var expires = "";
            if (days) {
                var date = new Date();
                date.setTime(date.getTime() + (days*24*60*60*1000));
                expires = "; expires=" + date.toUTCString();
            }
            document.cookie = name + "=" + (value || "")  + expires + "; path=/";
        },
        getCartProducts(){
            this.products = JSON.parse(localStorage.getItem('cart'));
            console.log(this.products);
        },
        removeProduct(id){
            this.products = this.products.filter( product => {
                return product.id !== id
            });
            this.updateCart();
        },
        updateCart(){
            localStorage.setItem('cart', JSON.stringify(this.products));
        },
    }
}
</script>

<style scoped>
i {
    cursor: pointer;
    font-size: 35px;
    transition: 0.8s ease all;
}

.destroy-basket-item {
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
    margin-left: 50px;
    font-size: 20px;
}

.name {
    font-size: 18px;
    width: 150px;
}

.empty-cart {
    margin-top: 50px;
}

.empty-cart h2 {
    margin-left: 100px;
    font-size: 24px;
    margin-bottom: 10px;
}

.empty-cart p {
    margin-left: 135px;
    font-size: 18px;
}
</style>
