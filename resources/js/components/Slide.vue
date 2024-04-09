<template>
    <div class="slide">
        <transition name="slide">
            <slot></slot>
        </transition>
    </div>
</template>

<script>
export default {
    name: "Slide"
}
</script>

<style lang="scss" scoped>

.slide-enter-active,
.slide-leave-active {
    transition: opacity 0.5s ease-in-out;
}

.slide-enter-from,
.slide-leave-to{
    opacity: 0;
}

.slide-enter-to,
.slide-leave-from{
    opacity: 1;
}

</style>

