<template>
    <el-menu :default-active="activeIndex" class="el-menu-demo d-flex justify-content-center" mode="horizontal" @select="handleSelect">
        <el-menu-item>
            <i class="el-icon-s-home"></i>
        </el-menu-item>
        
        <el-submenu index="1">
            <template slot="title">Thời sự</template>
            <el-menu-item index="1-1">item one</el-menu-item>
            <el-menu-item index="1-2">item two</el-menu-item>
            <el-menu-item index="1-3">item three</el-menu-item>
        </el-submenu>
        <el-submenu index="2">
            <template slot="title">Góc nhìn</template>
            <el-menu-item index="2-1">item one</el-menu-item>
            <el-menu-item index="2-2">item two</el-menu-item>
            <el-menu-item index="2-3">item three</el-menu-item>
        </el-submenu>
        <el-submenu index="3">
            <template slot="title">Thế giới</template>
            <el-menu-item index="3-1">item one</el-menu-item>
            <el-menu-item index="3-2">item two</el-menu-item>
            <el-menu-item index="3-3">item three</el-menu-item>
        </el-submenu>
        <el-submenu index="4">
            <template slot="title">Vdeo</template>
            <el-menu-item index="4-1">item one</el-menu-item>
            <el-menu-item index="4-2">item two</el-menu-item>
            <el-menu-item index="4-3">item three</el-menu-item>
        </el-submenu>
        <el-submenu index="5">
            <template slot="title">Podcasts</template>
            <el-menu-item index="5-1">item one</el-menu-item>
            <el-menu-item index="5-2">item two</el-menu-item>
            <el-menu-item index="5-3">item three</el-menu-item>
        </el-submenu>
        <el-submenu index="6">
            <template slot="title">Kinh doanh</template>
            <el-menu-item index="6-1">item one</el-menu-item>
            <el-menu-item index="6-2">item two</el-menu-item>
            <el-menu-item index="6-3">item three</el-menu-item>
        </el-submenu>
        <el-submenu index="7">
            <template slot="title">Khoa học</template>
            <el-menu-item index="7-1">item one</el-menu-item>
            <el-menu-item index="7-2">item two</el-menu-item>
            <el-menu-item index="7-3">item three</el-menu-item>
        </el-submenu>
        <el-submenu index="8">
            <template slot="title">Giải trí</template>
            <el-menu-item index="8-1">item one</el-menu-item>
            <el-menu-item index="8-2">item two</el-menu-item>
            <el-menu-item index="8-3">item three</el-menu-item>
        </el-submenu>
        <el-submenu index="9">
            <template slot="title">Thể thao</template>
            <el-menu-item index="9-1">item one</el-menu-item>
            <el-menu-item index="9-2">item two</el-menu-item>
            <el-menu-item index="9-3">item three</el-menu-item>
        </el-submenu>
        <el-submenu index="10">
            <template slot="title">Pháp luật</template>
            <el-menu-item index="10-1">item one</el-menu-item>
            <el-menu-item index="10-2">item two</el-menu-item>
            <el-menu-item index="10-3">item three</el-menu-item>
        </el-submenu>
        <el-submenu index="11">
            <template slot="title">Giáo dục</template>
            <el-menu-item index="11-1">item one</el-menu-item>
            <el-menu-item index="11-2">item two</el-menu-item>
            <el-menu-item index="11-3">item three</el-menu-item>
        </el-submenu>
        <el-submenu index="12">
            <template slot="title">Sức khoẻ</template>
            <el-menu-item index="12-1">item one</el-menu-item>
            <el-menu-item index="12-2">item two</el-menu-item>
            <el-menu-item index="12-3">item three</el-menu-item>
        </el-submenu>
    </el-menu>
</template>

<script>
export default {
    data(){
        return{
           
        }
    }
}
</script>

<style>
.el-submenu__icon-arrow{
    display: none;
}
.el-submenu__title{
    padding: 0 10px 0 10px;
}
</style>