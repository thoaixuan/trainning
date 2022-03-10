new Vue({
    el: '#app',
    vuetify: new Vuetify(),
    data: () => ({
        laguages: [],
        storages: [],
        localTime: " ",
        ghim: "fa-solid fa-star",
    }),
    methods: {
        getData: function() {
            const URL = "https://yfapi.net/v6/finance/quote?region=US&lang=en&symbols=AAPL%2CBTC-USD%2CEURUSD%3DX";
            axios.get(URL, {
                headers: {
                    'accept': 'application/json',
                    'X-API-KEY': 'N6z3BnXy1y5B50g1QYYY9BFhy2xknmr1QP5sXOj0'
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
        getDataRealTime: function() {
            var item = this;
            setInterval(function() {
                const URL = "https://yfapi.net/v6/finance/quote?region=US&lang=en&symbols=AAPL%2CBTC-USD%2CEURUSD%3DX";
                axios.get(URL, {
                    headers: {
                        'accept': 'application/json',
                        'X-API-KEY': 'N6z3BnXy1y5B50g1QYYY9BFhy2xknmr1QP5sXOj0'
                    }
                }).then(
                    res => {
                        item.laguages = res.data.quoteResponse.result;
                        console.log(res.data.quoteResponse.result);
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
        theoDoi: function(languges, regions, quoteTypes) {
            const tmp = [
                languges,
                regions,
                quoteTypes
            ];
            this.storages.push(tmp);
            console.log(this.storages);
        }



    },
    mounted() {
        this.getData();
        this.showLocaleTime();
        this.yeuthich.shift();

        // this.getDataRealTime();
    }
})