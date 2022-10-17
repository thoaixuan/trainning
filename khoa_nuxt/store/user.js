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
        let res = await axios.post(`http://localhost:8000/users/signin`,data);
        return res;
    },
    async signUp({commit}, data){
        console.log(data)
        let res = await axios.post(`http://localhost:8000/users/signup`,data);
        return res;
    },
}