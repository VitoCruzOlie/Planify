<script setup lang="ts">
import CardUserEvent from "../components/CardUserEvent.vue";

import { ref } from 'vue';
import { useStore } from 'vuex'

const store = useStore();

const attrs = ref([
    {
        highlight: true,
        dates: [new Date()]
    }
]);

async function load() {
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
    })
}

load()

</script>

<template>
    <main class="p-2 flex justify-center flex-col">
        <VCalendar expanded color="blue" :attributes="attrs" />
        <section>
            <CardUserEvent />
        </section>
    </main>
</template>