import { createRouter, createWebHistory } from "vue-router";
import Home from "../views/Home.vue";
import CalendarView from "../views/CalendarView.vue";
import Register from "../views/Register.vue";
import Login from "../views/Login.vue";
import CreateEvent from "@/views/CreateEvent.vue";
import EventDetails from "@/views/EventDetails.vue";
import EditUser from "@/views/EditUser.vue";

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: "/",
      name: "home",
      component: Home,
    },
    {
      path: "/calendar",
      name: "calendar",
      component: CalendarView,
    },
    {
      path: "/register",
      name: "register",
      component: Register,
    },
    {
      path: "/login",
      name: "login",
      component: Login,
    },
    {
      path: "/create-event",
      name: "create-event",
      component: CreateEvent,
    },
    {
      path: "/event-details/:id",
      name: "event-details",
      component: EventDetails,
    },
    {
      path: "/edit-user",
      name: "edit-user",
      component: EditUser,
    },
  ],
});

export default router;
