<!-- Please remove this file from your project -->
<template>
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

      <tr v-for="(item, index) in tmp" :key="index">
        <td v-text="item.id"></td>
        <td v-text="item.email"></td>
        <td v-text="item.first_name"></td>
        <td v-text="item.last_name"></td>
        <td><img :src="item.avatar" /></td>
        <td>{{ localTime }}</td>
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

        <tr v-for="(item, index) in users" :key="index">
          <td v-text="item.id"></td>
          <td v-text="item.email"></td>
          <td v-text="item.first_name"></td>
          <td v-text="item.last_name"></td>
          <td><img :src="item.avatar" /></td>
          <td
            v-on:click="
              theoDoi(
                item.id,
                item.email,
                item.first_name,
                item.last_name,
                item.avatar
              )
            "
          >
            <Icon></Icon>
          </td>
        </tr>
      </table>
    </div>
  </div>
</template>

<script>
export default {
  name: "NuxtTable",
  data: () => ({
    users: [],
    storages: [],
    persons: [],
    tmp: [],
    localTime: " ",
    ghim: "fa-solid fa-star",
  }),
  methods: {
    async getData() {
      const URL = "https://reqres.in/api/users?page=2";
      let data = await this.$axios.$get(URL);
      this.users = data.data;
      console.log(this.users);
    },
    async getDataRealTime() {
      const URL = "https://reqres.in/api/users?page=2";
      let data = await this.$axios.$get(URL);
      setInterval(function () {
        this.users = data.data;
        console.log(data.data);
      }, 1000);
    },
    async showLocaleTime() {
      var time = this;
      setInterval(function () {
        time.localTime = new Date().toLocaleTimeString();
      }, 1000);
    },
    async theoDoi(id, email, first_name, last_name, avatar) {
      const tmp = [id, email, first_name, last_name, avatar];
      const person = {
        id: id,
        email: email,
        first_name: first_name,
        last_name: last_name,
        avatar: avatar,
      };
      this.storages.push(tmp);
      this.persons.push(person);
      window.localStorage.setItem("data", JSON.stringify(this.persons));
      this.tmp = JSON.parse(window.localStorage.getItem("data"));
      console.log(this.storages);
    },
    async data() {
      this.tmp = JSON.parse(window.localStorage.getItem("data"));
      console.log(this.storages);
    },
  },
  mounted() {
    this.getData();
    this.showLocaleTime();
    this.storages.shift();
    this.data();
    // this.getDataRealTime();
  },
};
</script>
<style scoped>
#app {
  margin: auto;
  padding: auto;
  width: 50%;
}
table,
th,
tr,
td {
  border: 1px solid;
}
table {
  text-align: center;
  width: 670px;
  border-collapse: collapse;
}
img {
  width: 24px;
  text-align: center;
}
.content {
  margin-top: 24px;
}
</style>
