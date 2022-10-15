<template>
    <el-row>
        <el-col><h4 class="text-danger">Chủ đề</h4></el-col>
        <el-col v-for="item in topic" :key="item.name">
            <p>{{item.name}}</p>
        </el-col>
    </el-row>
</template>

<script>
export default {
    data(){
        return{
           topic:[
            {'name':'Chính trị & chính sách'},
            {'name':'Y tế & sức khoẻ'},
            {'name':'Kinh doanh & quản trị'},
            {'name':'Giáo dục & tri thức'},
            {'name':'Môi trường'},
            {'name':'Văn hoá & lối sống'},
            {'name':'Covid 19'},
           ]
        }
    }
}
</script>

<style>

</style>