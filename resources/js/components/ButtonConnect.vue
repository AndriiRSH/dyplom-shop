<template>
    <div :class="['fixed-call-form', { 'visible': isComponentVisible }]">
        <a href="#" @click="showForm" class="open-fixed-form" >ОТРИМАТИ КОНСУЛЬТАЦІЮ</a>
        <div  v-if="isFormVisible" :class="['fixed-form', { 'visible-form': isFormVisible, 'hide-form': isFormNoVisible } ]">
            <div @click="closeForm" class="close-fixed-form">
                <i class="fas fa-times close-form-line"></i>
            </div>
            <p><span class="site-link active">ОТРИМАТИ КОНСУЛЬТАЦІЮ:</span></p>
            <form action="/form/1" method="POST" autocomplete="off" onsubmit="" data-analytics="callback_form" class="focus">
                <input type="hidden" name="_token" value="d1dS4sO5IOzI6XFbBkaNhlqqjXJEnqEcHeFBsgUY">
                <input type="hidden" name="_method" value="PUT">
                <div class="flex-form">
                <label>
                    <span class="field-holder" v-if="!firstname">Ім'я* </span>
                    <input type="text" name="firstname" autocomplete="off" required="" v-model="firstname">
                </label>
                <label>
                    <span class="field-holder" v-if="!lastname">Прізвище</span>
                    <input type="text" name="lastname" autocomplete="off" v-model="lastname">
                </label>
                <label>
                    <span class="field-holder" v-if="!phone">Телефон* </span>
                    <input type="tel" name="phone" autocomplete="off" required="" v-model="phone">
                </label>
                <label>
                    <span class="field-holder" v-if="!email">Email</span>
                    <input type="email" name="email" autocomplete="off" v-model="email">
                </label>
                <label>
                    <span class="textarea-holder">Що Вас цікавить?</span>
                    <textarea name="message"></textarea>
                </label>
            </div>
                <label class="label-submit">
                    <span class="font-mob-14 rect-link">Надіслати</span>
                    <input type="submit">
                </label>
            </form>
        </div>
    </div>
</template>

<script>
export default {
    name: "ButtonConnect",
    data() {
        return {
            isComponentVisible: false,
            isFormVisible: false,
            isFormNoVisible: false,
            firstname: '',
            lastname: '',
            phone: '',
            email: '',
        };
    },
    created() {
        window.addEventListener("scroll", this.handleScroll);
    },
    beforeDestroy() {
        window.removeEventListener("scroll", this.handleScroll);
    },
    methods: {
        handleScroll() {
            // Визначаємо, чи має з'явитися компонент
            const scrollY = window.scrollY || window.pageYOffset;
            if (scrollY > 100) { // Змініть цей поріг на той, який вам потрібен
                this.isComponentVisible = true;
            } else {
                this.isComponentVisible = false;
            }
        },
        showForm(event) {
            event.preventDefault();
            this.isFormVisible = true;
            this.isFormNoVisible = false;
        },
        closeForm(){
            this.isFormNoVisible = true;
        }
    }
};
</script>

<style lang="scss" scoped>
.fixed-form {
    position: fixed;
    z-index: 10003;
    bottom: 0;
    right: 0;
    transform: translateY(100%); // Start hidden below the viewport
    background: #ffffff;
    width: 630px;
    padding: 75px 80px 70px 80px;
    box-shadow: 3px 5px 0 0 #000 inset;
    opacity: 0; // Start hidden
    transition: transform 0.5s ease, opacity 0.5s ease;
    &.visible-form {
        animation: slide-up 0.5s ease forwards; // Use the slide-up animation
    }
    &.hide-form {
        animation: slide-down 0.5s ease forwards; // Use the slide-down animation for closing
    }
}


.fixed-call-form {
    position: fixed;
    display: flex;
    background: #000000;
    z-index: 9999;
    bottom: 0;
    right: 0;
    transform: translate(0, 100%);
    transition: transform 0.3s ease; // Доданий перехід для згладження з'явлення
}

.visible {
    transform: translate(0, 0);
}

.open-fixed-form {
    color: #fff;
    text-transform: uppercase;
    font-size: 20px;
    padding: 11px 0;
    width: 630px;
    text-align: center;
    text-decoration: none;
}

.fixed-form{
    opacity: 1;
    transform: matrix(1, 0, 0, 1, 0, 0);
    .close-fixed-form{
        opacity: 0.5;
        transition: opacity 0.3s;
        position: fixed;
        display: flex;
        top: 20px;
        right: 15px;
        cursor: pointer;
        .close-form-line{
            fill: none;
            stroke: #000;
            isolation: isolate;
            font-size: 30px;
            color: black;
        }
    }
    .site-link{
        font-size: 30px;
        margin: 0 0 0 -20px;
        padding: 0 10px 0 30px;
        text-align: center;
        white-space: nowrap;
    }

}
@keyframes slide-up {
    from {
        transform: translateY(100%);
        opacity: 0;
    }
    to {
        transform: translateY(0);
        opacity: 1;
    }
}

@keyframes slide-down {
    from {
        transform: translateY(0);
        opacity: 1;
    }
    to {
        transform: translateY(100%);
        opacity: 0;
    }
}
</style>
