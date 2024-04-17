import axios from 'axios';

const state = (): object => ({
    userEvents : []
})

// ACTIONS

const actions = {
    async getEvents({commit}) {
        try {
            const response = await axios.get('http://localhost:8989/api/user/events', {
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': 'Bearer 1|vaS6tMwXlXfXXM4MJh75TRzr1z1VG3dAs62SW1RI6c2c9bc6'
                }
            }).then(r => r.data.data)
            commit('pushUserEvents', response)
        } catch (error) {
            console.log(error)
        }
    }
}

// MUTATIONS

const mutations = {
    pushUserEvents(state: any, data :any) {
        state.userEvents = []
        data.forEach(e => {
            state.userEvents.push(e)
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