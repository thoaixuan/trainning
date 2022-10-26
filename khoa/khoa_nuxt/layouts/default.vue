<template>
  <el-container>
    <el-header>
        <Navbar/>
        <div class="w-100 border-bottom"></div>
        <MenuItem/>
    </el-header>
    <el-main class="mt-5">
        <Nuxt/>
    </el-main>
  </el-container>
</template>

<script>
import Navbar from "../components/Navbar.vue";
import MenuItem from "../components/MenuItem.vue";
export default {
    components: { Navbar, MenuItem }
}
</script>

<style>

</style>