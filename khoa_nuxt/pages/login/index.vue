<template>
    <div class="d-flex justify-content-center mt-5">
        <el-card>
            <el-tabs v-model="activeName" @tab-click="handleClick">
                <el-tab-pane label="Đăng nhập" name="login">
                    <el-form ref="form">
                        <el-form-item label="Tài khoản">
                            <el-input></el-input>
                        </el-form-item>
                        <el-form-item label="Mật khẩu">
                            <el-input></el-input>
                        </el-form-item>
                        <el-form-item class="text-center">
                            <el-button type="primary">Đăng nhập</el-button>
                        </el-form-item>
                    </el-form>
                </el-tab-pane>
                <el-tab-pane label="Đăng ký" name="signup">
                    <el-form ref="form">
                        <el-form-item label="Tài khoản">
                            <el-input></el-input>
                        </el-form-item>
                        <el-form-item label="Mật khẩu">
                            <el-input></el-input>
                        </el-form-item>
                        <el-form-item label="Họ">
                            <el-input></el-input>
                        </el-form-item>
                        <el-form-item label="Tên">
                            <el-input></el-input>
                        </el-form-item>
                        <el-form-item class="text-center">
                            <el-button type="primary">Đăng ký</el-button>
                        </el-form-item>
                    </el-form>
                </el-tab-pane>
            </el-tabs>
            
        </el-card>
    </div>
    
    
</template>

<script>
export default {
    layout: "empty",
    data() {
      return {
        activeName: 'login'
      };
    },
}
</script>

<style>
.el-tabs__nav-wrap{
    display: flex;
    justify-content: center;
}
.el-form-item{
    margin-bottom: 10px;
}
</style>