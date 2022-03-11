<script setup>
import DocumentationIcon from './icons/IconDocumentation.vue'
import ToolingIcon from './icons/IconTooling.vue'
import EcosystemIcon from './icons/IconEcosystem.vue'
import CommunityIcon from './icons/IconCommunity.vue'
import SupportIcon from './icons/IconSupport.vue'
import * as Vue from 'vue' 
import axios from 'axios'
import VueAxios from 'vue-axios'

</script>

<template >
<div id="app">
  <table>
  <tr>
    <th>id</th>
    <th>email</th>
    <th>first_name</th>
    <th>last_name</th>
    <th>avatar</th>
    <th>time</th>
  </tr>

  <tr v-for="(item,index) in storages" :key="index">
    <td v-text="item[0]"></td>
    <td v-text="item[1]"></td>
    <td v-text="item[2]"></td>
    <td v-text="item[3]"></td>
    <td><img :src="item[4]" /></td>
    <td>{{localTime}}</td>
  </tr>
</table>
<div class="content">
  <table>
  <tr>
    <th>id</th>
    <th>email</th>
    <th>first_name</th>
    <th>last_name</th>
    <th>avatar</th>
    <th>action</th>
    
  </tr>

  <tr v-for="(item,index) in users" :key="index">
    <td v-text="item.id"></td>
    <td v-text="item.email"></td>
    <td v-text="item.first_name"></td>
    <td v-text="item.last_name"></td>
    <td><img :src="item.avatar" /></td>
    <td v-on:click="theoDoi(item.id,item.email,item.first_name,item.last_name,item.avatar)"><SupportIcon></SupportIcon></td>
    
  </tr>
</table>
</div>
</div>

</template>

<script>
  export default {
  data:() =>({
        users: [],
        storages: [],
        localTime: " ",
        ghim: "fa-solid fa-star",
  }),
   methods: {
        getData: function() {
            const URL = "https://reqres.in/api/users?page=2";
            axios.get(URL, {
                headers: {
                    'accept': 'application/json',
                    // 'X-API-KEY': 'N6z3BnXy1y5B50g1QYYY9BFhy2xknmr1QP5sXOj0'
                }
            }).then(
                res => {
                    this.users = res.data.data;
                    console.log(res.data.data);
                }
            ).catch(err => {
                console.log(err);
            });
        },
        getDataRealTime: function() {
            var item = this;
            setInterval(function() {
                const URL = "https://reqres.in/api/users?page=2";
                axios.get(URL, {
                    headers: {
                        'accept': 'application/json',
                        // 'X-API-KEY': 'N6z3BnXy1y5B50g1QYYY9BFhy2xknmr1QP5sXOj0'
                    }
                }).then(
                    res => {
                        item.users = res.data.data;
                        console.log(res.data.data);
                    }
                )
            }, 10000);
        },
        showLocaleTime: function() {
            var time = this;
            setInterval(function() {
                time.localTime = new Date().toLocaleTimeString();
            }, 1000);
        },
        theoDoi: function(id, email, first_name,last_name,avatar) {
            const tmp = [
                id,
                email,
                first_name,
                last_name,
                avatar
            ];
            this.storages.push(tmp);
            console.log(this.storages);
        }

    },
    mounted() {
        this.getData();
        this.showLocaleTime();
        this.storages.shift();
        this.getDataRealTime();
    }
}
</script>
<style scoped>
#app{
  margin:auto;
  padding:auto;
  width:50%;
}
table, th ,tr ,td{
    border: 1px solid;
} 
table{
    text-align: center;
    width: 670px;
    border-collapse: collapse;
}
img{
  width:24px;
  text-align:center;
}
.content{
  margin-top:24px;
}
</style>
