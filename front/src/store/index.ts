import { createStore, } from 'vuex'
import event from './modules/event'
import users from './modules/user'

export default createStore({
  modules: {
    event,
    users
  },
})