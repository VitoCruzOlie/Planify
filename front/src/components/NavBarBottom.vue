<script setup lang="ts">
import { PhCalendar, PhCalendarPlus, PhHouse, PhUserCircle } from "@phosphor-icons/vue";

import { useRouter } from "vue-router";

// ROUTER
const router = useRouter()

let actualRoute = router.currentRoute.value.path
</script>

<template>
    <nav  class="bg-primary">
        <router-link to="/">
            <PhHouse :size="40" :color="actualRoute === '/' ? '#000000' : '#F7F9FB'" />
        </router-link>
        <router-link to="/calendar">
            <PhCalendar :size="40" :color="actualRoute === '/calendar' ? '#000000' : '#F7F9FB'" />
        </router-link>
        <router-link to="/user">
            <PhUserCircle :size="40" :color="actualRoute === '/user' ? '#000000' : '#F7F9FB'" />
        </router-link>
        <router-link to="/create-event">
            <PhCalendarPlus :size="40" :color="actualRoute === '/create-event' ? '#000000' : '#F7F9FB'" />
        </router-link>
    </nav>
</template>

<style scoped>
nav {
    display: flex;
    position: fixed;
    bottom: 0;
    justify-content: space-around;
    align-items: center;
    width: 100%;
    height: 5rem;
    border-top-left-radius: 28px;
    border-top-right-radius: 28px;
}
</style>