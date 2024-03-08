import axios from 'axios';
export default {
    data() {
        return {
            data: {
                email: "",
                password: "",
            },
            baseUrl: "https://api.e-gate.vn",
        };
    },
    methods: {
        async login() {
            var vm = this;
            try {
                let res = await axios.post(vm.baseUrl + "/api/mobile/auth/login", vm.data);
                window.location.href = "/";
            } catch (error) {
                console.log(error);
            }
        },

    },
    mounted() {
        var vm = this;
        vm.$nextTick(async () => {
        });
    },
};