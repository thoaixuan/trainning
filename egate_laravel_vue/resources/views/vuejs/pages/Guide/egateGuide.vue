<template>
  <div>
    <blockquote class="blockquote text-center mt-4 mb-4">
      <h1 class="mb-0">Bắt đầu với ứng dụng e-Gate</h1>
    </blockquote>
    <div class="container">
      <div class="row">
        <div class="col-md-4 d-flex justify-content-start start-wellcome">
          <img src="/assets/background/chao-mung.png" class="img-fluid rounded-3" width="300px"/>
        </div>
        <div class="col-md-8">
          <div class="step-setup">
        • Bước 1. Tải xuống và cài đặt ứng dụng <br>
        • Bước 2. Đăng ký tài khoản mới hoặc Đăng nhập khi đã có tài khoản <br>
        • Bước 3. Bắt đầu sử dụng các dịch vụ của e-Gate ngay trên ứng dụng
          </div>
          <div class="fw-bold step-setup mt-3 text-center">GIAO NHẬN THỜI THƯỢNG, TẢI LÀ LÊN HƯƠNG!</div>
          <div class="row">
            <div class="col-6 d-flex justify-content-center">
              <img src="/assets/background/qr_e-Gate.png" class="img-fluid" width="200px"/>
            </div>
            <div class="col-6 d-flex align-items-center">
            <div class="d-flex flex-column bd-highlight">
              <div class="p-2 bd-highlight">
              <a href="https://play.google.com/store/apps/details?id=com.ing.vn" target="_blank"><img src="/assets/background/googleplay.webp" class="img-fluid mb-2"/></a>
              </div>
              <div class="p-2 bd-highlight">
              <a href="https://apps.apple.com/vn/app/e-gate/id1590817074?l=vi" target="_blank"><img src="/assets/background/appstore.webp" class="img-fluid mt-2"/></a>
              </div>
            </div>
            </div>
          </div>
        </div>
      </div>
      <blockquote class="blockquote text-center mt-4 mb-4">
      <h1>Hướng dẫn sử dụng e-Gate Box</h1>
      </blockquote>
      
      <div class="bg-white p-2 rounded-3 mt-2">
        <div class="row">
          <div class="col-md-12">
            <div v-html="text_guide"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script scope>
import load_api from '../../../../../api.json';

export default {
  data() {
    return {
      model: [],
      textdata:``,
      isOpen: 0,
      text_guide: "",
    };
  },
  methods: {
    async fetchData() {
      let vm = this;
      let data = await vm.$store.dispatch("fetchData",load_api.setting.settingByKey+"?fields=app_guibook");
      this.text_guide = data.data.app_guibook;
    },
  },
  mounted() {
    document.querySelector("body").classList.add("bd-custom");
    document.querySelector(".bd-custom .footer-top").style.display = "none";
    var vm = this;
    vm.$nextTick(async () => {
      await vm.fetchData();
    });
  },

}
</script>