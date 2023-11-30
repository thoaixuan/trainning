<template>
<div>
  <!-- Banner product -->
  <Banner></Banner>
  <!-- Category filller -->
  <Category></Category>
  <!-- Collecrtion product -->
  <Collection> </Collection>
  <!-- Selling product -->
  <Selling></Selling>
  <!-- Discount product -->
  <Discount></Discount>
  
</div>
</template>

<script>
import Banner from './components/Banner.vue'
import Category from './components/Category.vue'
import Collection from './components/Collection.vue'
import Selling from './components/Selling.vue'
import Discount from './components/Discount.vue'
export default {
  metaInfo() {
    return {
      title: "Center | Danh mục sản phẩm"
    }
  },
  components: {
    Banner,
    Category,
    Collection,
    Selling,
    Discount
  },
 
}
</script>

<style>

</style>