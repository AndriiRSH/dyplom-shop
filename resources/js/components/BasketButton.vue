<template>

    <a @click.prevent="addToCart(product.id)" class="bg-black btn custom-btn">
        До кошику
        <img width="30" height="30" alt="Корзина" src="/images/cart.svg">
    </a>

</template>

<script>
export default {
    name: "BasketButton",
    props: ['product'],

    methods: {
        addToCart(id){

            let cart = localStorage.getItem('cart')
            let newProduct = [
                {
                    'id': id,
                    'qty': 1
                }
            ]
            if (!cart) {

                localStorage.setItem('cart', JSON.stringify(newProduct));
            } else {
                cart = JSON.parse(cart)
                cart.forEach(productInCart => {
                    if (productInCart.id === id){
                        productInCart.qty = Number(productInCart.qty)
                        newProduct = null
                    }
                })
                Array.prototype.push.apply(cart, newProduct)

                localStorage.setItem('cart', JSON.stringify(cart))
            }
        },
    },
}
</script>

<style scoped>
.custom-btn {
    background-color: black;
    color: white;
    font-size: 20px; /* Ваш розмір шрифту */
    padding: 15px 25px; /* Ваші власні величини відступів */
    width: 250px;
    transition: background-color 0.3s; /* Анімація для плавного змінення кольору */
}

.custom-btn:hover {
    background-color: #333; /* Колір, який ви хочете використовувати при наведенні */
    color: white;
}
</style>
