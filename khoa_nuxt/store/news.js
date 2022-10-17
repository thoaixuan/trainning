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
    async getNews({commit}, data){
        let res = await axios.get(`${process.env.BASEWEB}/news?page=`+data.page+`&txtSearch=`+data.txtSearch);
        commit('getNews', res.data);
        console.log(res)
        return res;
    },
    async getNewsDetail({commit}, id){
        let res = await axios.get(`${process.env.BASEWEB}/news/` + id);
        commit('getNewsDetail', res.data);
        return res;
    }
}