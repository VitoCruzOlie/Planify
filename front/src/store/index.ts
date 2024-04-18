import { createStore, } from 'vuex'
import event from './modules/event'
import user from './modules/user'

export default createStore({
  modules: {
    event,
    user
  },
})