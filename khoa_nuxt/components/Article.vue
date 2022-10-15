<template>
    <div>
        <el-card class="mb-3" shadow="hover" v-for="m in model" :key="m._id" >
            <a class="text-muted" :href="`/news/${m._id}`">
                <el-row type="flex" justify="space-between">
                    <el-col :span="16" :offset="1">
                        <h4>{{m.title}}</h4>
                        <p>{{m.summary}}</p>
                    </el-col>
                    <el-col :span="5" :offset="1">
                        <img class="rounded-circle" :src="m.image"/>
                    </el-col>
                </el-row>
                <el-row type="flex">
                    <el-col :span="16" :offset="1">
                        <span>Y tế và sức khoẻ</span>
                        <el-button size="mini" type="text" icon="el-icon-chat-square">17</el-button>
                    </el-col>
                    <el-col :span="5" :offset="1">
                        <span class="text-nowrap">Nguyễn Kiều Hưng</span>
                    </el-col>
                </el-row>
            </a>
        </el-card>
    </div>
</template>

<script>
export default {
    props:["model"]
}
</script>

<style>
.rounded-circle{
    width: 90px !important;
    height: 90px !important;
}
</style>