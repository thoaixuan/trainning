<template>
  <div>
    <!-- BEGIN: Header-->
    <nav class="header-navbar navbar-expand-lg navbar navbar-with-menu floating-nav navbar-light navbar-shadow">
    <div class="navbar-wrapper">
    <div class="navbar-container content">
    <div class="navbar-collapse" id="navbar-mobile">
        <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
            <ul class="nav navbar-nav">
                <li class="nav-item mobile-menu d-xl-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ficon feather icon-menu"></i></a></li>
            </ul>
            <ul class="nav navbar-nav bookmark-icons" v-if="this.$route.path!='/clients-dashboard/e-gate-gpt-chat'">
                <li class="nav-item d-none d-lg-block"><a class="nav-link" href="/clients-dashboard/order" data-toggle="tooltip" data-placement="top" title="Đơn hàng"><i class="ficon feather icon-package"></i></a></li>
                <li class="nav-item d-none d-lg-block"><a class="nav-link" href="/clients-dashboard/ticket" data-toggle="tooltip" data-placement="top" title="Tư vấn/ Hỗ trợ"><i class="ficon feather icon-phone-call"></i></a></li>
                <li class="nav-item d-none d-lg-block"><a class="nav-link" href="/clients-dashboard/egate" data-toggle="tooltip" data-placement="top" title="e-Gate"><i class="ficon feather icon-cpu"></i></a></li>
            </ul>
        </div>
        <ul class="nav navbar-nav float-right">
            <li class="d-flex align-items-center mr-2"><a href="/"><i class="fa fa-home fa-lg text-primary" aria-hidden="true"></i> Về trang chủ</a></li>
            <li class="dropdown dropdown-language nav-item"><a class="dropdown-toggle nav-link" id="dropdown-flag" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-language fa-lg text-primary" title="Language" aria-hidden="true"></i></a>
                <div class="dropdown-menu" aria-labelledby="dropdown-flag"><a class="dropdown-item" href="#" @click="lang_en"><i class="flag-icon flag-icon-us"></i> English</a><a class="dropdown-item" href="#" @click="lang_vi"><i class="flag-icon flag-icon-vn"></i> Tiếng việt</a></div>
            </li>
            <li v-if="this.checkAuth" class="dropdown dropdown-notification nav-item"><a class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i class="ficon feather icon-bell"></i><span class="badge badge-pill badge-primary badge-up">{{totalTicket}}</span></a>
                <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                    <li class="dropdown-menu-header">
                        <div class="dropdown-header m-0 p-2">
                            <h3 class="text-white">{{totalTicket}} New</h3><span class="notification-title">Notifications</span>
                        </div>
                    </li>
                    <li class="scrollable-container media-list">
                       
                        <a class="d-flex justify-content-between" href="javascript:void(0)" v-for="notify in modelTicket" :key="notify._id">
                            <div class="media d-flex align-items-start">
                                <div class="media-left"><i class="feather icon-message-circle font-medium-5 success"></i></div>
                                <div class="media-body">
                                    <h6 class="success media-heading red darken-1">{{notify.title}}</h6><small class="notification-text">{{notify.type.text}}</small>
                                </div><small>
                                    <time class="media-meta" datetime="2015-06-11T18:29:20+08:00">{{notify.status.text}}</time></small>
                            </div>
                        </a>
                    </li>
                    <li class="dropdown-menu-footer"><router-link to="/clients-dashboard/ticket"><a class="dropdown-item p-1 text-center">View all notifications</a></router-link></li>
                </ul>
            </li>
            <li v-if="this.checkAuth" class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                    <div class="user-nav d-sm-flex d-none"><span class="user-name text-bold-600" v-text="model.fullname"></span></div>
                    <span><img class="round" id="header-avatar" src alt="avatar" height="40" width="40"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <router-link class="dropdown-item" to="/clients-dashboard/profile"><i class="feather icon-user"></i> {{ $t('admin.profile') }}</router-link>
                    <router-link class="dropdown-item" to="/clients-dashboard/egate"><i class="feather icon-cpu"></i> e-Gate</router-link>
                    <router-link class="dropdown-item" to="/clients-dashboard/e-gate-gpt-chat"><i class="feather icon-message-circle"></i> Chatbot</router-link>
                    <router-link class="dropdown-item" to="/clients-dashboard/wallet"><i class="feather icon-dollar-sign"></i> {{ $t('admin.recharge') }}</router-link>
                    <router-link class="dropdown-item" to="/clients-dashboard/order"><i class="feather icon-package"></i> {{ $t('admin.order') }}</router-link>
                    <router-link class="dropdown-item" to="/clients-dashboard/ticket"><i class="feather icon-inbox"></i> {{ $t('admin.sendTicket') }}</router-link>
                    <div class="dropdown-divider"></div><a class="dropdown-item" @click="logout"><i class="feather icon-log-in"></i> {{ $t('admin.logout') }}</a>
                </div>
            </li>
        </ul>
    </div>
    </div>
    </div>
    </nav>
    <!-- END: Header-->
  </div>
</template>

<script>
import api from '../../../../../api.json'
export default {
    data() {
        return {
        checkAuth: false,
        model: [],
        modelTicket: [],
        totalTicket: ""
        };
    },
    methods: {
    async fetchData() {
      var vm = this;
      vm.$nextTick(async () => {
          if(!localStorage.getItem('auth')||localStorage.getItem('auth')=="") {
              return;
        }
        vm.checkAuth = true;
        let data = await vm.$store.dispatch("fetchData",api.auth.info);
        if(data.status==200){
            vm.model=data.data.result;
            const image = document.querySelector("#header-avatar");
            image.src=data.data.result.avatar||"/themes/assets/images/logo_admin/user.png";
        }
        vm.fetchTicket();
      });
    },
    async fetchTicket(){
        var vm = this;
        let res = await vm.$store.dispatch("fetchData",api.ticket.get+"?page=1&limit=5");
        vm.modelTicket = res.data.data;
        vm.totalTicket=res.data.total.rows;
    },
    logout() {
        window.location.href = "/login";
        localStorage.removeItem('auth');
    },
    lang_vi() {
        localStorage.setItem('lang','vi');
        window.location.reload();
    },
    lang_en() {
        localStorage.setItem('lang','en');
        window.location.reload();
    },
    },
    mounted() {
    var vm = this;
    vm.$nextTick(async () => {
        vm.fetchData();
    });
    },
}
</script>

<style>

</style>