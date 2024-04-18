import axios from 'axios';

const state = (): object => ({
    userEvents: [],
    allEvents: []
})

// ACTIONS

const USER_TOKEN = localStorage.getItem('token');

const actions = {
    async getEvents({ commit }) {
        try {
            const response = await axios.get('http://localhost:8989/api/user/events', {
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': 'Bearer ' + USER_TOKEN
                }
            }).then(r => r.data.data)
            commit('pushUserEvents', response)
        } catch (error) {
            console.log(error)
            throw error
        }
    },
    async getAllEvents({ commit }) {
        try {
            const response = await axios.get('http://localhost:8989/api/event', {
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': 'Bearer ' + USER_TOKEN
                }
            }).then(r => r.data.data)
            commit('pushAllEvents', response)
        } catch (error) {
            console.log(error)
        }
    }
}

// MUTATIONS

const mutations = {
    pushUserEvents(state: any, data: any) {
        state.userEvents = []
        data.forEach(e => {
            state.userEvents.push(e)
        });
    },
    pushAllEvents(state: any, data: any) {
        state.allEvents = []
        data.forEach(e => {
            state.allEvents.push(e)
            console.log(e)
        });
    }
}

// GETTERS

const getters = {
    userEvents(state: any) {
        return state.userEvents
    }
}

export default {
    namespaced: true,
    state,
    actions,
    mutations,
    getters
}