<template>
  <div>
    <meta data-vmid="description" name="description" content="Child description.">
    <header-component></header-component>
    <Transition>
      <router-view></router-view>
    </Transition>
    <footer-component></footer-component>
  </div>
</template>
<script>
  export default {
    name: 'App',
    metaInfo: {
      title: 'e-Gate - Kết nối kỷ nguyên công nghệ',
      meta: [{
      vmid: 'description',
      name: 'description',
      content: 'Cung cấp các giải pháp về ứng dụng công nghệ tiên tiến nhất nhằm nâng cao trải nghiệm của người dùng trên hệ thống. Các sản phẩm chất lượng - Bảo vệ môi trường và các sản phẩm công nghệ tiện ích.',
    }]
    }
  }
</script>
<style>
.slide-fade-enter-active {
  transition: all 0.3s ease-out;
}

.slide-fade-leave-active {
  transition: all 0.8s cubic-bezier(1, 0.5, 0.8, 1);
}

.slide-fade-enter-from,
.slide-fade-leave-to {
  transform: translateX(20px);
  opacity: 0;
}
</style>

