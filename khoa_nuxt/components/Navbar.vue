<template>

    <nav class="navbar">
        <div class="container-fluid">
            <el-row type="flex" justify="center" class="w-100 align-items-center">
                <el-button size="small" icon="el-icon-s-fold" class="navbar-toggler" data-bs-toggle="navbarNavDropdown" data-bs-target="#navbarNavDropdown"></el-button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">

                </div>
                <el-col :span="12">
                    <el-row type="flex" justify="space-between" class="align-items-center">
                        <el-col :span="8">
                            <img class="img-thumbnail border-0"
                                src="https://s1.vnecdn.net/vnexpress/restruct/i/v654/v2_2019/pc/graphics/logo.svg"
                                alt="VnExpress - Bao tieng Viet nhieu nguoi xem nhat">
                        </el-col>
                        <el-col :span="16">
                            <span>Thứ tư, 5/10/2022</span>
                        </el-col>
                    </el-row>
                </el-col>
                <el-col :span="12">
                    <el-row type="flex" justify="center">
                        <el-button size="mini" icon="el-icon-time" round>Mới nhất</el-button>
                        <el-button size="mini" icon="el-icon-warning-outline" round>International</el-button>

                        <el-input size="mini" placeholder="Type something" prefix-icon="el-icon-search">
                        </el-input>

                        <el-button @click="toSignIn()" size="mini" icon="el-icon-user" round>Đăng nhập</el-button>

                    </el-row>
                </el-col>
            </el-row>
        </div>
    </nav>
</template>

<script>
export default {
    methods: {
        toSignIn(){
            this.$router.push('/login')
        }
    },
}
</script>

<style>
.el-button {
    margin: 0 10px 0 10px;
}
</style>