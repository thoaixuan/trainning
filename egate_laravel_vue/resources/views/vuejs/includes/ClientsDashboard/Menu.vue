<template>
  <div>
    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto">
                    <a class="navbar-brand" href="/clients-dashboard"> <h2 class="brand-text mb-0">e-Gate</h2> </a>
                </li>
                <li class="nav-item nav-toggle nav-icon-close"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="icon-disc"></i></a></li>
            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class=" navigation-header"><span>Apps</span>
                </li>
                <li class=" nav-item">
                    <router-link to="/clients-dashboard/egate" @click.native="toggleMenu"><img class="w-50" src="/themes/assets/images/logo/logo.png"></router-link>
                </li>
                <li class="nav-item">
                    <router-link to="/clients-dashboard/e-gate-gpt-chat" @click.native="toggleMenu"><i class="ficon feather icon-message-square"></i><span class="menu-title">e-Gate GPT Chat</span></router-link>
                </li>
                <li class=" nav-item">
                    <router-link to="/clients-dashboard/wallet" @click.native="toggleMenu"><i class="ficon feather icon-dollar-sign"></i><span class="menu-title">{{ $t('admin.recharge') }}</span></router-link>
                </li>
                <li  class=" nav-item">
                    <router-link to="/clients-dashboard/order" @click.native="toggleMenu"><i class="ficon feather icon-shopping-bag"></i><span class="menu-title">{{ $t('admin.order') }}</span></router-link>
                </li>
                <li class=" navigation-header"><span>Support</span>
                </li>
                <li class=" nav-item">
                    <router-link to="/clients-dashboard/ticket" @click.native="toggleMenu"><i class="fa fa-ticket"></i><span class="menu-title">{{ $t('admin.sendTicket') }}</span></router-link>
                </li>
                <li class="nav-item">
                    <router-link to="/clients-dashboard/profile" @click.native="toggleMenu"><i class="feather icon-user"></i><span class="menu-title">{{ $t('admin.profile') }}</span></router-link>
                </li>
                <li class="nav-item" v-if="this.$route.path!='/clients-dashboard/e-gate-gpt-chat'">
                    <a @click="logout"><i class="feather icon-log-in"></i><span class="menu-title">{{ $t('admin.logout') }}</span></a>
                </li>
            </ul>
        </div>
    </div>
    <!-- END: Main Menu--> 
  </div>
</template>

<script>
export default {
methods: {
    toggleMenu(){
        $(".vertical-overlay-menu .modern-nav-toggle").click();
    },
    logout() {
        window.location.href = "/login";
        localStorage.removeItem('auth');
    }
    }
}
</script>

<style>

</style>