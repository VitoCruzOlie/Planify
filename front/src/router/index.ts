import { createRouter, createWebHistory } from 'vue-router';
import Home from '../views/Home.vue';
import CalendarView from '../views/CalendarView.vue';
import Register from '../views/Register.vue';
import Login from '../views/Login.vue';
import CreateEvent from '@/views/CreateEvent.vue';

const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes: [
      {
        path: '/',
        name: 'home',
        component: Home
      },
      {
        path: '/calendar',
        name: 'calendar',
        component: CalendarView
      },
      {
        path: '/register',
        name: 'register',
        component: Register
      },
      {
        path: '/login',
        name: 'login',
        component: Login
      },
      {
        path:'/create-event',
        name: 'create-event',
        component: CreateEvent
      }
    ]
  })
  
  export default router