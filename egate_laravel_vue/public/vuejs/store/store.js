
import axios from "axios";
import Vue from 'vue';
import Vuex from 'vuex';
Vue.use(Vuex);
export default new Vuex.Store({
    state: {
        loginUser:null,
        total: 0,
        model: [],
        cart: {},
        auth: false,
        product: {},
        provinces: {},
        districts: {},
        wards: {},
        ticket: [],

    },
    mutations: {
        setLoginUser(state, user) {
            localStorage.setItem("auth",user.token)
            state.loginUser = user;
            state.auth = true;
        },
        init(state, payload) {
            state.model = payload;
        },
        initCart(state, payload) {
            state.cart = payload;
        },
        initAuth(state, payload) {
            state.auth = payload;
        },
        initProduct(state, payload) {
            state.product = payload.data.data;
        },
        initTotal(state, payload) {
            state.total = payload.data.total.rows;
        },
        initProvinces(state, payload) {
            // state.provinces = payload.data;
            if (payload.data.result) {
                state.provinces = payload.data.result.table.rows;
            }
        },
        initDistricts(state, payload) {
            // state.districts = payload.data;
            if (payload.data.result) {
                state.districts = payload.data.result.table.rows;
            }
        },
        initWard(state, payload) {
            state.wards = payload.data;
        },
        initTicket(state, payload) {
            state.ticket = payload.data.data;
        }
    },
    actions: {
        // Fetch waiting wallet
        async fetchWaiting({ state, commit }, api) {
            try {
                let res = await axios.get(api);
                return res;
            } catch (error) {
                console.log(error)
            }

        },
        // Fetch data
        async fetchData({ state, commit }, api) {
            try {
                let res = await axios.get(api);
                commit('init', res.data.data);
                return res;
            } catch (error) {
                console.log(error)
            }

        },
        async postSendData({ state, commit }, api, data) {
            let res = await axios.post(api, data);
            commit('init', res.data.data);
            return res;
        },
        // Get data 
        async getByID({ state, commit }, api) {
            let res = await axios.get(api);
            commit('init', res);
            return res;
        },
        //  FetchData Cart
        async fetchCart({ state, commit }) {
            let data = JSON.parse(localStorage.getItem('shoppingCart') || "[]");
            commit('initCart', data);
        },
        // PostData
        async postData({ state, commit }, object) {
            let res = await axios.post(object.api, object.data);
            return res;
        },
        // fetch data in auth
        async fetchAuth({ state, commit }) {
            if (localStorage.getItem('auth')) {
                commit('initAuth', true);
            }
        },
        //fetch product
        async fetchProduct({ state, commit }, api) {
            let res = await axios.get(api);
            commit('initProduct', res);
            commit('initTotal', res);
            return res;
        },
        async fetchProvinces({ state, commit }, api) {
            let res = await axios.get(api);
            commit('initProvinces', res);
            return res;
        },
        async fetchDistricts({ state, commit }, api) {
            let res = await axios.get(api);
            commit('initDistricts', res);
            return res;
        },
        async fetchWards({ state, commit }, api) {
            let res = await axios.get(api);
            commit('initWard', res);
            return res;
        },
        async fetchTicket({ state, commit }, api) {
            let res = await axios.get(api);
            commit('initTicket', res);
            return res;
        },
        // Xóa ticket 
        async deleteTicket({ state, commit }, api) {
            let res = await axios.delete(api);
            return res;
        },
        // Đóng ticket 
        async postTicket({ state, commit }, object) {
            let res = await axios.post(object);
            commit('initTicket', res);
            return res;
        }
    },
    getters: {
        trans: state => state.model,
        auth: state => state.auth,
        product: state => state.product
    }
}
);


