<template>
    <el-row type="flex" justify="center" v-if="modelDetail">
        <el-col :span="1">
                <el-button class="mb-3" type="primary" icon="el-icon-edit" circle></el-button>
                <el-button class="mb-3" type="primary" icon="el-icon-edit" circle></el-button>
                <el-button class="mb-3" type="primary" icon="el-icon-edit" circle></el-button>
                <el-button class="mb-3" type="primary" icon="el-icon-edit" circle></el-button>
                <el-button class="mb-3" type="primary" icon="el-icon-edit" circle></el-button>
                <el-button class="mb-3" type="primary" icon="el-icon-edit" circle></el-button>
        </el-col>
        <el-col :span="10" :offset="1">
            <el-row type="flex">
                <el-col>
                    <el-page-header title="Góc nhìn" content="Chủ đề">
                    </el-page-header>
                </el-col>
                <el-col><p>Thứ sáu, 14/10/2022, 00:00 (GMT+7)</p></el-col>
            </el-row>
            
            <h1>{{modelDetail.result}}</h1>
            
            <el-row type="flex">
                <el-col class="d-flex align-items-center">
                    <img class="rounded-circle" :src="modelDetail" alt="Nguyễn Kiều Hưng"/>
                    <div class="mx-3">
                        <a class="text-decoration-none text-dark fw-bold" href="/">Nguyễn Khắc Giang</a>
                        <p class="text-muted">Nghiên cứu viên</p>
                    </div>
                </el-col>
                <el-col class="text-center mx-auto">
                    <el-button icon="el-icon-plus">Theo dõi</el-button>
                </el-col>
            </el-row>
            <div class="lh-base" v-html="modelDetail">

            </div>
        </el-col>
        
    </el-row>
</template>

<script>
export default {

    computed:{
        modelDetail(){
            return this.$store.state.news.modelDetail;
        }
    },
    mounted(){
        this.$store.dispatch("news/getNewsDetail", this.$route.params.id);
    }
}
</script>

<style>

</style>