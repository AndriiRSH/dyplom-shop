
<template>
    <div class="product mt-3 " v-for="product in products">
        <img :src="'/storage/' + product.preview_image" alt="фото товару" class="img-fluid">
        <div class="name">{{ product.title }}</div>
        <div class="price">{{ product.price }}₴</div>
        <i @click.prevent="removeProduct(product.id)" class="fa-regular fa-circle-xmark destroy-basket-item"></i>
    </div>
    <div style="display: flex; align-items: center; margin-top: 20px;">
        <h3 style="margin-right: 10px;">До сплати:</h3>
        <h4 style="margin-left: 245px;">{{ totalCost }}₴</h4>
    </div>
    <a href="/checkout" style="background-color: white; color: black; border: 1px solid black; padding: 10px 20px; width: 300px; margin-left: 70px; border-radius: 10px; text-decoration: none; display: inline-block; text-align: center">Оформити</a>
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
        };
    },
    computed: {
        totalCost() {
            this.getCartProducts();
            return this.products.reduce((total, item) => total + item.price, 0);
        }
    },
    methods:{
        setCookie(name,value,days) {
            var expires = "";
            if (days) {
                var date = new Date();
                date.setTime(date.getTime() + (days*24*60*60*1000));
                expires = "; expires=" + date.toUTCString();
            }
            document.cookie = name + "=" + (value || "")  + expires + "; path=/";
        },
        // toggleMobileNavBasket(){
        //     this.mobileNavBasket = !this.mobileNavBasket;
        //     this.showModal = !this.showModal;
        //     this.cartShow = !this.cartShow;
        // },
        getCartProducts(){
            this.products = JSON.parse(localStorage.getItem('cart'));
            console.log(this.products);
        },
        removeProduct(id){
            this.products = this.products.filter( product => {
                return product.id !== id
            })
            this.updateCart()
        },
        updateCart(){
            localStorage.setItem('cart', JSON.stringify(this.products))
        },
    },


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
    margin-left: 50px;
    font-size: 20px;
}

.name{
    font-size: 18px;
    width: 150px;
}
</style>
