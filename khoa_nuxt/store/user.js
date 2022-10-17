import axios from "axios";

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
        let res = await axios.post(`${process.env.BASEWEB}/users/signin`,data);
        return res;
    },
    async signUp({commit}, data){
        console.log(data)
        let res = await axios.post(`${process.env.BASEWEB}/users/signup`,data);
        return res;
    },
}