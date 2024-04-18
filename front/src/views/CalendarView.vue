<script setup lang="ts">
import CardUserEvent from "../components/CardUserEvent.vue";
import Skeleton from 'primevue/skeleton';

import { ref } from 'vue';
import { useStore } from 'vuex'

const store = useStore();

let attrs = ref([
    {
        highlight: true,
        dates: [new Date()]
    }
]);

let events = ref([])

let showSkeleton = ref(false);

async function load() {
    showSkeleton.value = true;
    await store.dispatch('event/getEvents')
    store.getters['event/userEvents'].forEach(e => {
        attrs.value.push({
            dot: true,
            popover: {
                label: e.name,
                visibility: 'hover',
                hideIndicator: true,
            },
            content: "blue",
            dates: [new Date(e.date)]
        })

        events.value.push(e);
        showSkeleton.value = false
    })
}

load()

</script>

<template>
    <main class="p-2 flex justify-center flex-col">
        <VCalendar expanded color="blue" :attributes="attrs" />
        <section>
            <CardUserEvent v-for="(event, index) in events" :key="index">
                <template v-slot:tittle>
                    <h1 class="text-black font-bold text-lg max-w-64 break-words">{{event.name}}</h1>
                </template>
                <template v-slot:description>
                    <p class="text-gray-500 text-sm">{{event.description}}</p>
                </template>
            </CardUserEvent>
        </section>
        <Skeleton v-if="showSkeleton" class="mt-4" width="100%" height="4rem" borderRadius="16px"></Skeleton>
        <Skeleton v-if="showSkeleton" class="mt-4" width="100%" height="4rem" borderRadius="16px"></Skeleton>
        <Skeleton v-if="showSkeleton" class="mt-4" width="100%" height="4rem" borderRadius="16px"></Skeleton>
    </main>
</template>