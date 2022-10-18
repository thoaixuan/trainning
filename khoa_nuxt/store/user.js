import axios from "axios";
import API from "../api.json"

//state
export const state = () => ({
    model: []
})

//mutation
export const mutations = {

}

//actions
export const actions = {
    async signIn({commit}, data){
        console.log(data)
        let res = await axios.post(`${process.env.BASEWEB}${API.user.signin}`,data);
        return res;
    },
    async signUp({commit}, data){
        console.log(data)
        let res = await axios.post(`${process.env.BASEWEB}${API.user.signup}`,data);
        return res;
    },
}