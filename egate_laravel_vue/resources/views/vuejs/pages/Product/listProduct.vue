<template>
<div>
         <!-- Category filller -->
        <CategoryProduct></CategoryProduct>
        <!-- Collecrtion product -->
        <Collection> </Collection>
        <!-- Discount product -->
        <div v-if="this.data!=='e-gate'">
          <Discount></Discount>
        </div>
</div>
</template>

<script>
import CategoryProduct from './components/CategoryProduct.vue'
import Collection from './components/Collection.vue'
import Discount from './components/Discount.vue'
export default {
  components: {
    CategoryProduct,
    Collection,
    Discount
  },
  data() {
    return {
      data: this.$route.params.id,
    };
  },
  methods: {
    
  },
  mounted() {
    var vm = this;
    vm.$nextTick(async () => {
    });
  },
  watch:{
        '$route'(to, from){
            this.data = to.params.id
        }
    }
}
</script>
