import axios from 'axios';

const state = (): object => ({
    users: []
})

const USER_TOKEN = localStorage.getItem('token');

// ACTIONS

const actions = {
    async register({ commit }, data) {
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
    async login({ commit }, data) {
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
    async confirmInvite({ commit }, data) {
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
    },
    async allUsers({ commit }, data) {
        try {
            const response = await axios.get("http://localhost:8989/api/user/not-invited/" + data, {
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': 'Bearer ' + USER_TOKEN
                }
            }).then(r => r.data.data)
            commit('pushAllUsers', response)
        } catch (error) {
            console.log(error)
            throw error
        }
    },
    async invite(state, data) {
        try {
            const response = await axios.post("http://localhost:8989/api/invite/" + data.id, {
                email: data.email
            }, {
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': 'Bearer ' + USER_TOKEN
                }
            })
            console.log(response)
        } catch (error) {
            console.log(error)
            throw error
        }
    },
    async updateUser(state, data) {
        try {
            const response = await axios.put("http://localhost:8989/api/user", data, {
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': 'Bearer ' + USER_TOKEN
                }
            })
            console.log(response)
        } catch (error) {
            console.log(error)
            throw error
        }
    },
    async showUser() {
        try {
            const response = await axios.get("http://localhost:8989/api/user", {
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': 'Bearer ' + USER_TOKEN
                }
            }).then(r => r.data.data)
            return response
        } catch (error) {
            console.log(error)
            throw error
        }
    }
}

// MUTATIONS

const mutations = {
    pushAllUsers(state: any, data: any) {
        state.users = []
        data.forEach(e => {
            state.users.push(e)
        });
    }
}

// GETTERS

const getters = {
    getUsers(state: any) {
        return state.users
    }
}

export default {
    namespaced: true,
    state,
    actions,
    mutations,
    getters
}