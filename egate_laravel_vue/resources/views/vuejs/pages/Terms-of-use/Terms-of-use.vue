<template>
  <div>
    <blockquote class="blockquote text-center bg-white">
      <h1 class="mb-0">Điều khoản sử dụng</h1>
    </blockquote>
    <div class="container">
      <div class="bg-white p-2 rounded-3">
        <div class="row">
          <div class="col-md-12">
            <div v-html="terms"></div>

          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import load_api from '../../../../../api.json';

export default {
  metaInfo() {
    return {
      title: "Điều khoản sử dụng"
    }
  },
  data() {
    return {
      terms: ""
    }
  },
  methods: {
    async fetchData() {
      let vm = this;
      // this.collapses[1].text = data;
      let data = await vm.$store.dispatch("fetchData",load_api.setting.setting);
      vm.terms = data.data.terms_of_use;
      console.log(data.data);
    },
  },
  mounted() {
    var vm = this;
    vm.$nextTick(async () => {
      await vm.fetchData();
    });
  },
}
</script>

