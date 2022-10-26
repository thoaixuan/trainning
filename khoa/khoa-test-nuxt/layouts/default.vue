<template>
  <div class="global-style">
    <Navbar/>
    <Nuxt/>
    <Footer/>
  </div>
</template>

<script>
import Navbar from '../components/Navbar.vue';
import Footer from '../components/Footer.vue';
export default {
  name: 'default',
    components: { Navbar, Footer }
}
</script>

<style>
.global-style{
  font-family: "BreakersSlab-Bold",serif;
  font-size: 16px;
}
</style>