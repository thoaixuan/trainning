<template>
    <el-row type="flex" justify="center" class="h-100 align-items-center">
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
                
                    <el-input
                        size="mini"
                        placeholder="Type something"
                        prefix-icon="el-icon-search"
                        v-model="txtSearch">
                    </el-input>

                <el-button size="mini" icon="el-icon-user" round>Đăng nhập</el-button>
                
            </el-row>
        </el-col>
    </el-row>
</template>

<script>
export default {

}
</script>

<style>
.el-button {
    margin: 0 10px 0 10px;
}
</style>