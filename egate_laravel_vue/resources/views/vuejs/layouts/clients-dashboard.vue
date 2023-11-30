<template>
  <div>
    <!-- Header clients Dashboard -->
    <Header></Header>
    <!-- Menu clients Dashboard -->
    <Menu></Menu>
    
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
               <router-view></router-view>
            </div>
        </div>
    </div>
    <!-- END: Content-->

  </div>
</template>

<script>
import Header from '../includes/ClientsDashboard/Header.vue'
import Menu from '../includes/ClientsDashboard/Menu.vue'


export default {
components: {
      Header,
      Menu,
    },
}
</script>

<style>
.main-menu .navbar-header .navbar-brand .brand-text{
  color: #649bfd;
}
.primary {
    color: #649bfd !important;
}
.badge.badge-primary {
    background-color: #649bfd;
}
.main-menu.menu-light .navigation > li.active > a {
    background: -webkit-linear-gradient(332deg, #ededed, rgb(253 253 253 / 70%)) !important;

    background: linear-gradient(118deg, #ededed, rgb(253 253 253 / 70%)) !important;
    box-shadow: 0 0 9px 1px rgb(237 237 237 / 70%) !important;
    color: black;
    font-weight: 400;
    border-radius: 4px;

    /* background: -webkit-linear-gradient(332deg, #649bfd, rgba(121, 172, 248, 0.7)) !important;
    background: linear-gradient(118deg, #649bfd, rgba(114, 171, 236, 0.7)) !important;
    box-shadow: 0 0 10px 1px rgba(90, 176, 247, 0.7) !important;
    color: black;
    font-weight: 400;
    border-radius: 4px; */
}
</style>