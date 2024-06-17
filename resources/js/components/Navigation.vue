<template>
    <header :class="{ 'scrolled-nav': scrolledNav }">
        <nav>
            <div class="icon" :class="{'icon-active-all' : scrolledNav}">
<!--                <i class="fa-solid fa-circle-user profile"></i>-->
<!--                <i @click="toggleMobileNav" v-show="mobile" class="fas fa-bars" :class="{'icon-active': mobileNav}"></i>-->
                <div @click="toggleMobileNav" class="burger" :class="{'icon-active': mobileNav}">
                    <div class="top" style=""></div>
                    <div class="center" style=""></div>
                    <div class="bottom" style=""></div>
                </div>
<!--                <div class="hidden_menu" v-show="mobileNav" style="transform: matrix(1, 0, 0, 1, 0, 0);">-->
                    <div class="hidden_menu" :class="{ 'menu-active': mobileNav }">
                        <div class="menu_wrapper" style="transform: matrix(1, 0, 0, 1, 0, 0); position: relative;">
                            <ul class="">
                                <li><a class="link">Головна</a></li>
                                <li><a :href="categoryProductUrl(1)" class="link">Картини</a></li>
                                <li><a :href="categoryProductUrl(2)" class="link">Скульптури</a></li>
                                <li><a :href="categoryProductUrl(3)" class="link">Декор</a></li>
                                <li><a :href="categoryProductUrl(4)" class="link">Дизайн</a></li>
                            </ul>
                            <div class="menu_wrap" style="position: absolute; bottom: 20px;">
                                <a href="" class="fa-brands fa-instagram fa-2xl pl-3"></a>
                                <a href="" class="fa-brands fa-facebook fa-2xl p-3"></a>
<!--                                <a href="" class="fa-brands fa-telegram fa-2xl"></a>-->
                            </div>
                        </div>

                </div>
                <a class="phone" href="tel:+380956449469">+380956449469</a>
<!--                <div class="language">-->
<!--                    <button class="font-16 font-mob-20">uk</button>-->
<!--&lt;!&ndash;                    <ul>&ndash;&gt;-->
<!--&lt;!&ndash;                        <li>&ndash;&gt;-->
<!--&lt;!&ndash;                            <a href="#" class="font-16 font-mob-20">&ndash;&gt;-->
<!--&lt;!&ndash;                                en&ndash;&gt;-->
<!--&lt;!&ndash;                            </a>&ndash;&gt;-->
<!--&lt;!&ndash;                        </li>&ndash;&gt;-->
<!--&lt;!&ndash;                    </ul>&ndash;&gt;-->
<!--                </div>-->

            </div>


        </nav>
    </header>
</template>

<script>
export default {
    name: "Navigation",
    data(){
        return {
            scrolledNav: null,
            mobile: true,
            mobileNav: null,
            windowWidth: null,
            isScrolled: false,
        };
    },
    created() {
      window.addEventListener("resize", this.checkScreen);
      this.checkScreen();
    },
    mounted() {
        window.addEventListener("scroll", this.updateScroll);
    },
    destroyed() {
        window.removeEventListener('scroll', this.handleScroll);
    },
    methods: {
        toggleMobileNav(){
            this.mobileNav = !this.mobileNav;
        },

        updateScroll(){
            const scrollPosition = window.scrollY;
            if (scrollPosition > 50){
                this.scrolledNav = true;
                return;
            }
            this.scrolledNav = false;
        },

        checkScreen(){
            this.windowWidth = window.innerWidth;
            this.mobileNav = false;
            return;
        },

        categoryProductUrl(categoryId) {
            return categoryId + "/posts/";
        }
    },
};
</script>

<style lang="scss" scoped>

.hidden_menu {
    transform: matrix(1, 0, 0, 1, 0, 0);
    position: fixed;
    left: 0;
    top: 0;
    bottom: 0;
    padding: 0 0 0 7.549759780370624vw;
    background: #fff;
    height: 100%;
    //transform: translate(-105%,0);
    z-index: 40;
}

.menu_wrapper {
    transform: matrix(1, 0, 0, 1, 0, 0);
    display: flex;
    flex-flow: column nowrap;
    background: #000000;
    height: 100%;
    padding: 7.25vh 2.059025394646534vw 0 3.4317089910775564vw;
    //transform: translate(-150%, 0);
    align-items: baseline;
    width: 400px;
}

header{
    background-color: rgba(0, 0, 0, 0);
    z-index: 99;
    width: 100%;
    position: fixed;
    transition: .5s ease all;
    color: #fff;

    .icon-active-all{
        .burger{
            .top, .center, .bottom {
                //transition: all 0.5s ease; /* Додайте перехід для всіх властивостей з тривалістю 0.5 секунд та ефектом згладжування */
                background: black;
            }
        }
        .phone{
            color: black;
        }
        .language{
            button, a {
                color: black;
            }
        }
    }

    nav{
        position: relative;
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        padding: 12px 0;
        transition: .5s ease all;
        width: 90%;
        margin: 0 auto;

    ul,
    .link{
        font-weight: 500;
        color: #fff;
        list-style: none;
        text-decoration: none;
    }

    li{
        text-transform: uppercase;
        padding: 16px;
        margin-left: 16px;
    }

    .link{
        font-size: 21px;
        transition: .5s ease all;
        padding-bottom: 4px;
        border-bottom: 1px solid transparent;

        &:hover{
            color: #00afea;
            border-color: #00afea;
            cursor: pointer;
        }
    }
        .branding{
            display: flex;
            align-items: center;
        }

        .navigation{
            display: flex;
            align-items: center;
            flex: 1;
            justify-content: flex-end;
        }

    .icon{
        display: flex;
        align-items: center;
        justify-content: space-between;
        position: absolute;
        right: 0;
        //top: 0;
        margin-top: 25px;
        left: -30px;
        height: 100%;

        .profile{
            padding-right: 25px;
        }

        i{
            cursor: pointer;
            font-size: 35px;
            transition: 0.8s ease all;
            //padding-right: 25px;
        }
    }
        .icon-active{
            .top, .center, .bottom {
                transition: all 0.5s ease; /* Додайте перехід для всіх властивостей з тривалістю 0.5 секунд та ефектом згладжування */
                background: black;
            }
            .top{
                top: 50%;
                transform: matrix(0.96592, 0.25881, -0.25881, 0.96592, 0, 0);
            }
            .center{
                left: 20%;
                opacity: 0;
            }

            .bottom{
                top: 50%;
                transform: matrix(0.96592, -0.25881, 0.25881, 0.96592, 0, 0);
            }
            //content: '';
            //position: absolute;
            //top: -50%;
            //bottom: -50%;
            //left: -25%;
            //right: -25%;
        }

        .dropdown-nav{
            display: flex;
            flex-direction: column;
            position: fixed;
            width: 100%;
            max-width: 530px;
            height: 100%;
            background-color: #fff;
            top: 0;
            left: 0;

            li{
                margin-left: 250px;
                margin-top: 20px;
                .link{
                    color: #000;
                    font-size: 24px;
                }
            }
        }

        .mobile-nav-enter-active,
        .mobile-nav-leave-active{
            transition: 1s ease all;
        }

        .mobile-nav-enter-from,
        .mobile-nav-leave-to{
            transform: translateX(-250px);
        }

        .mobile-nav-enter-to{
            transform: translateX(150px);
        }

 }
}

.icon-active-all{
    color: black;
}

.scrolled-nav{
    //background-color: #000;
    //box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);

    nav{
        padding: 8px 0;

        .branding{

        }
    }
}

.burger {
    width: 4.118050789293068vw;
    height: 1.5099519560741248vw;
    display: flex;
    justify-content: flex-start;
    align-items: center;
    position: relative;
    min-width: 30px;
    min-height: 20px;
    cursor: pointer;
    z-index: 50;
    max-width: 60px;

}

.burger div.top {
    transition: all 0.5s ease; /* Додайте перехід для всіх властивостей з тривалістю 0.5 секунд та ефектом згладжування */
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 2px;
    background: #fff;
    //background: black;
    transform: translateY(-1px);
}

.burger div.center {
    transition: all 0.5s ease; /* Додайте перехід для всіх властивостей з тривалістю 0.5 секунд та ефектом згладжування */
    position: absolute;
    left: 0;
    display: block;
    width: 60%;
    height: 2px;
    background: #fff;
    //background: black;
    top: 50%;
    //top: calc(50% - 1px);
    z-index: 50;
}

.burger div.bottom {
    transition: all 0.5s ease; /* Додайте перехід для всіх властивостей з тривалістю 0.5 секунд та ефектом згладжування */
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 2px;
    background: #fff;
    //background: black;
    transform: translateY(1px);
}

.burger .icon-active{
    //content: '';
    //position: absolute;
    //top: -50%;
    //bottom: -50%;
    //left: -25%;
    //right: -25%;
}

.phone{
    color: #ffffff;
    margin-left: auto;
    margin-right: 15px;
    position: relative;
    z-index: 150;
    letter-spacing: 0.09285714285714286em;
}

.language{
    position: relative;
}

.language button {
    color: #ffffff;
    text-transform: uppercase;
    opacity: 0.8;
    position: relative;
    font-weight: 400;
}

.transparent-header .language ul {
    background: rgba(255,255,255,0);
}

.language ul {
    opacity: 0;
    transform: scaleY(0);
    transform-origin: top center;
    position: absolute;
    top: 100%;
    left: 0;
    right: 0;
    background: #ffffff;
}

.language button {
    color: #ffffff;
    text-transform: uppercase;
    opacity: 0.8;
    position: relative;
    font-weight: 400;
}

header ul, footer ul {
    padding: 0;
    margin: 0;
    list-style: none;
}

button {
    background: transparent;
    border: none;
    border-radius: 0;
    padding: 0;
}

.hidden_menu {
    position: fixed;
    left: 0;
    top: 0;
    bottom: 0;
    padding: 0 0 0 7.549759780370624vw;
    background: #fff;
    height: 100%;
    transform: translateX(-105%);
    transition: transform 0.5s ease; /* Add a transition for a smooth effect */
    z-index: 40;
}

.menu-active {
    transform: translateX(0);
}

.menu_wrapper {
    display: flex;
    flex-flow: column nowrap;
    background: #000000;
    height: 100%;
    padding: 7.25vh 2.059025394646534vw 0 3.4317089910775564vw;
    align-items: baseline;
    width: 400px;
}



</style>
