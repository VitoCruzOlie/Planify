import { createApp } from 'vue'
import './style.css'
import App from './App.vue';
import router from "./router";
import PrimeVue from 'primevue/config';
import 'primevue/resources/themes/aura-light-green/theme.css';
import VCalendar from 'v-calendar';
import 'v-calendar/style.css';
import store from './store'

const app = createApp(App);
app.use(PrimeVue);
app.use(router);
app.use(VCalendar, {})
app.use(store)


app.mount('#app');

