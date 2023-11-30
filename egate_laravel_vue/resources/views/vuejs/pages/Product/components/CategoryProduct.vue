<template>
  <div v-loading="loading">
    <div class="section category pt-0 pb-0">
      <div class="container">
        <div class="row mb-5 align-items-center">
          <div class="col-md-12">
            <h2 class="text-uppercase">STORE.</h2>
            <p class="lead">The best way to buy the products you love.</p>
          </div>
          <div class="col-md-12">
            <div id="filters" class="filters mt-5 mb-4 p-3" v-if="dataCategory.length">
              <div v-for="(item, index) in dataCategory" :key="index">
                <router-link :to="`/category/${item.slug}`" class="nav-link me-2"
                  :class="{ active: item.slug == $route.params.id }">
                  {{ item.name }}
                </router-link>
              </div>
            </div>
            <div class="row row-cols-xl-4 row-cols-lg-3 row-cols-md-2 row-cols-sm-2 row-cols-1 g-2" id="shoping-grid"
              v-if="product.length">
              <div class="col item tshirt" v-for="(item, index) in product" :key="index">
                <a href="#" class="item-wrap">
                  <router-link :to="`/product/${item._id}`">
                    <img class="rounded img-fluid img-content" :src="item.image[0]" alt="">
                  </router-link>
                  <div class="shop-info p-3">
                    <router-link :to="`/product/${item._id}`"><h5 class="text-uppercase text-light">{{ item.product_name }}</h5></router-link>
                    <!-- <span class="btn btn-white me-1" @click="addToCart(item)"><i class="fa fa-plus"></i></span>
                    <router-link :to="`/cart`"><span class="btn btn-white cart-btn"><i class="fa fa-shopping-cart"></i></span></router-link> -->
                  </div>
                </a>
              </div>
            </div><!-- .row end -->
          </div>
        </div> <!-- .row end -->
        <nav aria-label="d-flex flex-row-reverse Page navigation ">
          <ul class="pagination">
            <li class="page-item">
              <span class="page-link" @click="decreased" aria-label="Previous"><span
                  aria-hidden="true">&laquo;</span></span>
            </li>
            <div class=" d-flex flex-row" v-if="pages">
              <li class="page-item" v-for="index in pages" :key="index" :class="{ active: index == indexPages }">
                <span class="page-link" @click="setPage(index)">{{ index }}</span>
              </li>
            </div>
            <li class="page-item">
              <span class="page-link" @click="advanced" aria-label="Next"><span aria-hidden="true">&raquo;</span></span>
            </li>
          </ul>
        </nav>
      </div>
    </div>
  </div>
</template>
<script>
import api from '../../../../../../api.json'
import preloader from '../../../includes/preloader.vue'



export default {
  metaInfo() {
    return {
      title: this.setTitle(this.cateogry_id),
      meta: [
      {
        name: "description",
        content: "Các sản phẩm e-Gate, e-Timber gỗ tự nhiên ngoài trời, e-Solar đèn năng lượng mặt trời, e-Woco",
      },
      {
        property: "og:type",
        content: "website",
      },
      {
        name: "robots",
        content: "index,follow",
      },
    ],
    }
  },
  components: {
      preloader
  },
  data: function () {
    return {
    
      loading: true,
      currentPage: 8,
      dataCategory: [],
      shoppingCart: [],
      id: this.$route.params.id,
      pages: 0,
      indexPages: 1,
      checkIndex: true,
      cateogry_id:0,
      CategoryData:[
        {name:'e-Gate',_id:"61d3cd4e3617eb73c35e55b6",slug:'e-gate'},
        {name:'e-Timber',_id:"62c4f6023c540135ae998e4b",slug:'e-timber'},
        {name:'e-Solar',_id:"62c8f0f5b63c68adac529b2b",slug:'e-solar'},
        {name:'e-Woco',_id:"62d91ebd0b75b807de2fde85",slug:'e-woco'},
      ]
    }
  },
  computed: {
    product() {
      return this.$store.state.product;
    },
    total(){
      return this.$store.state.total;
    },
  },
  methods:
  {
    async fetchData() {
      var vm = this;
      let res = await vm.$store.dispatch("fetchData", api.product.getCategory);
      vm.dataCategory = JSON.parse(JSON.stringify(res.data[0].data));
      vm.$forceUpdate();
    },
    async fetchProduct(page) {
      
        var vm = this;
        vm.checkpreloader=true;
        vm.loading=true;
        // 62c4f6023c540135ae998e4b
        console.log(vm.cateogry_id);
        let res = await vm.$store.dispatch("fetchProduct", api.product.getAll + `?category_id=${vm.cateogry_id}` + '&page=' + page + '&pageSize=' + this.currentPage);
        if(res){
          vm.checkpreloader=false;
          vm.loading=false;
        }
        vm.pages = Math.ceil(parseInt(vm.total) / vm.currentPage);

    },
    decreased() {
      this.indexPages--;
      if (this.indexPages < 1) {
        this.indexPages = 1;
        this.checkIndex = false;
      }
      this.fetchProduct(this.indexPages);
      console.log(this.indexPages);
    },
    advanced() {
      this.indexPages++;
      if (this.indexPages >= this.pages) {
        this.indexPages = this.pages;
        this.checkIndex = false;
      }
      this.fetchProduct(this.indexPages);

    },
    setPage(page) {
      this.indexPages=page;
      this.fetchProduct(page);
      console.log(page);
    },
    setTitle(id) {
      if(id == "61d3cd4e3617eb73c35e55b6") {
        return "e-Gate | Danh mục sản phẩm e-Gate";
      }else if(id == "62c4f6023c540135ae998e4b") {
        return "e-Timber | Danh mục sản phẩm e-Timber";
      }else if(id == "62c8f0f5b63c68adac529b2b") {
        return "e-Solar | Danh mục sản phẩm e-Solar";
      }else if(id == "62d91ebd0b75b807de2fde85") {
        return "e-Woco | Danh mục sản phẩm e-Woco";
      }else {
        return "e-Gate | Danh mục sản phẩm";
      }
    },
    async addToCart(product) {
      var vm = this;
      let exists = false;
      for (const cartItem of this.shoppingCart) {
        if (cartItem._id === product._id) {
          cartItem.qty = cartItem.qty + 1;
          exists = true;
          break;
        }
      }
      if (!exists) {
        this.shoppingCart.push({
          ...product,
          qty: 1,
        })
        await vm.$store.dispatch("fetchCart");
      }
    },
  },
 async mounted() {
    var vm = this;
    vm.shoppingCart = JSON.parse(localStorage.getItem('shoppingCart') || "[]");
    vm.cateogry_id = await vm.CategoryData.filter((p) =>p.slug === vm.id)[0]._id ;
    console.log("vm.cateogry_id",vm.cateogry_id );
    vm.fetchData();
    vm.fetchProduct();

  },
  watch: {
    '$route'(to, from) {
      this.id = to.params.id
      this.cateogry_id = this.dataCategory.filter((p) =>p.slug === this.id)[0]._id;
      this.fetchProduct(1);
    },
    shoppingCart: {
      handler(newValue) {
        localStorage.setItem('shoppingCart', JSON.stringify(newValue));
        this.$store.dispatch("fetchCart");
      }, deep: true
    }
  }

}
</script>
