import axios from "axios";

//state
export const state = () => ({
    model: [],
    modelDetail: []
})

//mutation
export const mutations = {
    getNews(state, payload){
        state.model = payload
    },
    getNewsDetail(state, payload){
        state.modelDetail = payload
    }
}

//actions
export const actions = {
    async getNews({commit}){
        let res = await axios.get('https://api-dev.e-gate.vn/api/news/getAllIndex?page=1');
        commit('getNews', res.data);
        return res;
    },
    async getNewsDetail({commit}, id){
        let res = await axios.get('https://api-dev.e-gate.vn/api/mobile/news/getByID/' + id);
        commit('getNewsDetail', res.data);
        return res;
    }
}