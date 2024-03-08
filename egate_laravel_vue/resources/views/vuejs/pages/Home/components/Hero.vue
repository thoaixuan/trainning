<template>
  <div>
    <!-- header & hero img -->
    <div id="hero" class="section" >
        <div class="container-fluid">
            <div class="row g-3 align-items-center">
                <div class="col-lg-3 d-none d-lg-flex justify-content-end">
                    <ul class="nav flex-column" id="navbar">
                        <li class="nav-item"><router-link :to="{ name: 'preOrders' }"><a class="position-relative nav-link fw-bold scrollto active" aria-current="page">e-Gate <span class="pulse-active"><span class="pulse-green"></span></span></a></router-link></li>
                        <li class="nav-item"><a class="nav-link fw-bold scrollto" href="#about">About</a></li>
                        <li class="nav-item"><a class="nav-link fw-bold scrollto" href="#portfolio">Product</a></li>
                        <li class="nav-item"><a class="nav-link fw-bold scrollto" href="#contact">Contact</a></li>
                    </ul>
                </div>
                <div class="col-lg-9">
                    <div class="hero-container">
                         <VueSlickCarousel  id="heroCarousel" v-bind="settings">
                             <div class="carousel-item active">
                                    <img src="themes/assets/images/agency-portfolio/header_bg.png" class="img-fluid" alt="" >
                                </div>
                                <!-- Slide 2 -->
                                <div class="carousel-item">
                                    <img src="themes/assets/images/agency-portfolio/slide-02.jpg" class="img-fluid" alt="" >
                                </div>
                                <!-- Slide 3 -->
                                <div class="carousel-item">
                                    <img src="themes/assets/images/agency-portfolio/slide-03.jpg" class="img-fluid" alt="" >
                                </div>
                        </VueSlickCarousel>
                     
                    </div>
                </div>
            </div>

        </div>
    </div>
  </div>
</template>

<script>
import 'vue-slick-carousel/dist/vue-slick-carousel.css';
import VueSlickCarousel from 'vue-slick-carousel'

export default {
    data(){
        return{
            settings:{
                "dots": true,
                "dotsClass": "slick-dots custom-dot-class",
                "edgeFriction": 0.35,
                "infinite": false,
                "speed": 200,
                "slidesToShow": 1,
                "slidesToScroll": 1,
                "initialSlide": 0,
            },
        }
    },
    components: { VueSlickCarousel }
}
</script>

<style scoped>
</style>