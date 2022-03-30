<script setup>
import { RouterLink, RouterView } from 'vue-router'
</script>

<template>
  <header>

    <div class="wrapper">
    <h2> Loadding api</h2>
    </div>
  </header>

  <RouterView />
</template>

<style>
@import '@/assets/base.css';
h2{
  color: hsla(160, 100%, 37%, 1);
  text-align:center;
}
</style>
