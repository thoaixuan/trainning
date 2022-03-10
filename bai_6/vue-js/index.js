// Vue.createApp({
//     data() {
//         users: []
//     },
//     methods: {
//         getUser() {
//             const URL = "https://reqres.in/api/users?page=2";
//             axios
//             .get(URL)
//             .then(
//                 res => {
//                     console.log(res.data.data);
//                 }
//             )
//         },
//         mounted() {
//             this.getUser();
//         }
//     },
// }).mount('#app')
Vue.createApp({
    data: () => ({
        laguages: [],
        localTime: " "
    }),
    methods: {
        getData: function () {
            const URL = "https://yfapi.net/v6/finance/quote?region=US&lang=en&symbols=AAPL%2CBTC-USD%2CEURUSD%3DX";
            axios.get(URL, {
                headers: {
                    'accept': 'application/json',
                    'X-API-KEY': 'z5sssETknma7YJombSiSpgNoYSmj2VZ84hRY5TJ8'

                }
            }).then(
                res => {
                    this.laguages = res.data.quoteResponse.result;
                    console.log(res.data.quoteResponse.result);
                }
            ).catch(err => {
                console.log(err);
            });
        },
        getDataRealTime: function () {
            var item = this;
            setInterval(function () {
                const URL = "https://yfapi.net/v6/finance/quote?region=US&lang=en&symbols=AAPL%2CBTC-USD%2CEURUSD%3DX";
                axios.get(URL, {
                    headers: {
                        'accept': 'application/json',
                        'X-API-KEY': 'z5sssETknma7YJombSiSpgNoYSmj2VZ84hRY5TJ8'
                    }
                }).then(
                    res => {
                        item.laguages = res.data.quoteResponse.result;
                        console.log(res.data.quoteResponse.result);
                    }
                )
            }, 10000);
        },
        showLocaleTime: function () {
            var time = this;
            setInterval(function () {
                time.localTime = new Date().toLocaleTimeString();
            }, 1000);
        }

    },
    mounted() {
        this.getData();
        this.showLocaleTime();
        // this.getDataRealTime();
    }
}).mount('#app');
setInterval(Vue.createApp, 3000);
