<script setup lang="ts">
import { PhCalendar, PhCalendarPlus, PhHouse, PhUserCircle } from "@phosphor-icons/vue";

import { useRouter } from "vue-router";

// ROUTER
const router = useRouter()

let actualRoute = router.currentRoute.value.path
</script>

<template>
    <nav  class="bg-primary max-w-full md:max-w-md md:hidden rounded-t-lg flex z-10 items-center w-full h-20 border-0 place-content-around fixed bottom-0 left-1/2 -translate-x-1/2">
        <router-link to="/">
            <PhHouse :size="40" :color="actualRoute === '/' ? '#000000' : '#F7F9FB'" />
        </router-link>
        <router-link to="/calendar">
            <PhCalendar :size="40" :color="actualRoute === '/calendar' ? '#000000' : '#F7F9FB'" />
        </router-link>
        <router-link to="/edit-user">
            <PhUserCircle :size="40" :color="actualRoute === '/edit-user' ? '#000000' : '#F7F9FB'" />
        </router-link>
        <router-link to="/create-event">
            <PhCalendarPlus :size="40" :color="actualRoute === '/create-event' ? '#000000' : '#F7F9FB'" />
        </router-link>
    </nav>
</template>
