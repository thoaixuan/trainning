<template>
  <el-container>
    <el-header>
        <Navbar/>
        <div class="line"></div>
        <MenuItem/>
    </el-header>
    <el-main>
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
.line{
  width: 100%;
  border-bottom: 1px solid #e6e6e6;
}
</style>