<template>
    <div class="container" xmlns="http://www.w3.org/1999/html">
        <div class="row" style="margin-top: 110px;">

            <div class="col-md-6" style="padding-right: 50px;">
                <img :src="'/storage/' + product.preview_image" alt="фото товару" class="img-fluid">
            </div>

            <div class="col-md-6" style="padding-left: 50px;">
                <h2 style="font-size: 50px">{{ product.title }}</h2>
                <p style="padding-top: 50px; font-size: 20px; width: 350px">{{ product.description }}</p>
                <p class="" style="font-size: 35px; padding-left: 130px; padding-top: 130px">{{ product.price }} грн.</p>
                <a @click.prevent="addToCart(product)" class="btn custom-btn">
                    До кошику
                    <img width="30" height="30" alt="Корзина" src="/images/cart.svg">
                </a>
            </div>

            <div class="col-md-6" style="padding-top: 120px; margin-left: auto; font-size: 18px; text-align: justify;">
                <p>{{ product.content }}</p>
            </div>

        </div>
    </div>
</template>

<script>
export default {
    name: "Product",
    props: ['product'],

    methods: {
      addToCart(product){

          let cart = localStorage.getItem('cart')
          let newProduct = [
              {
                  'id': product.id,
                  'preview_image': product.preview_image,
                  'title': product.title,
                  'price': product.price,
                  'qty': 1
              }
          ]
          if (!cart) {
              localStorage.setItem('cart', JSON.stringify(newProduct));
          } else {
              cart = JSON.parse(cart)
              cart.forEach(productInCart => {
                  if (productInCart.id === product.id){
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

</style>
