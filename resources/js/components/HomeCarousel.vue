<template>
    <div class="home">
        <Carousel class="carousel" v-slot="{ currentSlide }">
            <Navigation></Navigation>
            <Slide v-for="(slide, index) in carouselSlides" :key="index">
                <div v-show="currentSlide === index + 1" class="slide-info">
                <div class="">
<!--                <div class="image-container">-->
                    <img :src="`/images/${slide}.jpg`" alt="">
                    <div class="overlay-text">
                        <h1 style="font-size: 110px; color: blanchedalmond">Moskalenko</h1>
                        <span style="font-size: 30px; color: white">design & architecture studio</span>
                    </div>
                </div>
                </div>>
            </Slide>
        </Carousel>
    </div>
</template>

<script>
import Carousel from "./Carousel.vue";
import Slide from "./Slide.vue";
import Navigation from "./Navigation.vue";
export default {
    name: "HomeCarousel",
    components: { Carousel, Slide, Navigation},
    setup() {
        const carouselSlides = ["bg-1", "bg-2", "bg-3"];

        return { carouselSlides };
    }
}
</script>

<style lang="scss" scoped>

.carousel{
    position: relative;
    max-height: 100vh;
    height: 100vh;
    overflow: hidden;
    .slide-info{
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        max-height: 100%;
        height: 100%;

        img{
            min-width: 100%;
            height: 100%;
            object-fit: cover;
        }
    }
}

</style>
