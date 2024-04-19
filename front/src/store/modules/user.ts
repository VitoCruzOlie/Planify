import axios from 'axios';

const state = (): object => ({
    user: []
})

const USER_TOKEN = localStorage.getItem('token');

// ACTIONS

const actions = {
    async register({commit}, data) {
        try {
            const response = await axios.post("http://localhost:8989/api/auth/register", data, {
                headers: {
                    'Content-Type': 'application/json',
                }
            }).then(r => r)
            console.log(response)
        } catch (error) {
            console.log(error)
            throw error
        }
    },
    async login({commit}, data) { 
        try {
            const response = await axios.post("http://localhost:8989/api/auth/login", data, {
                headers: {
                    'Content-Type': 'application/json',
                }
            }).then(r => r.data.data)
            localStorage.setItem("token", response.token)
        } catch (error) {
            console.log(error)
            throw error
        }
    },
    async confirmInvite({commit}, data) {
        try {
            await axios.post("http://localhost:8989/api/user/confirm/" + data, {}, {
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': 'Bearer ' + USER_TOKEN
                }
            })
        } catch (error) {
            console.log(error)
            throw error
        }
    }
}

export default {
    namespaced: true,
    state,
    actions
}