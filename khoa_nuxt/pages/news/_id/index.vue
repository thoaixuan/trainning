<template>
    <div class="container">
        <el-row type="flex" justify="center" v-if="modelDetail">
        <!-- <el-col :span="1" class="sticky-top">
                <el-button class="mb-3" type="primary" icon="el-icon-edit" circle></el-button>
                <el-button class="mb-3" type="primary" icon="el-icon-edit" circle></el-button>
                <el-button class="mb-3" type="primary" icon="el-icon-edit" circle></el-button>
                <el-button class="mb-3" type="primary" icon="el-icon-edit" circle></el-button>
                <el-button class="mb-3" type="primary" icon="el-icon-edit" circle></el-button>
                <el-button class="mb-3" type="primary" icon="el-icon-edit" circle></el-button>
        </el-col> -->
        <el-col>
            <div class="row">
                <div class="col-8 col-sm-6 col-lg-6 col-md-6">
                    <el-page-header class="text-nowrap justify-content-center" @back="goBack" title="Góc nhìn" content="Chủ đề">
                    </el-page-header>
                </div>
                <div class="col-4 col-sm-6 col-lg-6 col-md-6">
                    <p class="text-truncate text-center">Thứ sáu, 14/10/2022, 00:00 (GMT+7)</p>
                </div>
            </div>  
            
            <h1 class="text-center">{{modelDetail.title}}</h1>
            
            <div class="row my-3">
                <div class="col-12 col-lg-6 col-md-6">
                    <div class="d-flex align-items-center justify-content-center">
                        <img class="rounded-circle" :src="modelDetail.image" width="90" height="90" alt="Nguyễn Kiều Hưng"/>
                        <div class="mx-3">
                            <a class="text-decoration-none text-dark fw-bold text-nowrap" href="/">Nguyễn Khắc Giang</a>
                            <p class="text-muted text-nowrap">Nghiên cứu viên</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6 col-md-6 m-auto text-center">
                    <el-button icon="el-icon-plus">Theo dõi</el-button> 
                </div>
            </div>

            <div class="lh-base text-center text-justify" v-html="modelDetail.content">

            </div>
        </el-col>
        
    </el-row>
    </div>
    
</template>

<script>
export default {

    computed:{
        modelDetail(){
            return this.$store.state.news.modelDetail;
        }
    },
    methods:{
        goBack(){
            console.log('go back');
            this.$router.push('/')
        }
    },
    mounted(){
        this.$store.dispatch("news/getNewsDetail", this.$route.params.id);
    }
}
</script>

<style>

</style>