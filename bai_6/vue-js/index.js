Vue.createApp({
    data: () => ({
        laguages: [],
        yeuthich: [],
        localTime: " "
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
            this.yeuthich.push(tmp);
            this.yeuthich.filter(function(e) { return e === 0 || e });
            console.log(this.yeuthich);
        }



    },
    mounted() {
        this.getData();
        this.showLocaleTime();
        this.theoDoi();
        // this.getDataRealTime();
    }
}).mount('#app');
setInterval(Vue.createApp, 3000);