<template>
    <div class="carousel">
        <slot :currentSlide="currentSlide"></slot>
    </div>
</template>

<script>
import {ref, onMounted} from "vue";

export default {
    name: "Carousel",
    setup(){
        const currentSlide = ref(1)
        const getSlideCount = ref(null);
        const autoPlayEnabled = ref(true);
        const timeoutDuration = ref(5000);

        //next slide
        const nextSlide = () => {
            if (currentSlide.value === getSlideCount.value){
                currentSlide.value = 1;
                return;
            }
            currentSlide.value += 1;
        };

        //autoplay
        const autoPlay = () => {
            setInterval(() => {
                nextSlide()
            }, timeoutDuration.value);
        };

        if (autoPlayEnabled.value) {
            autoPlay();
        }

        onMounted(() => {
            getSlideCount.value = document.querySelectorAll('.slide').length;
        })

        return { currentSlide };
    },
}
</script>

<style scoped>

</style>
