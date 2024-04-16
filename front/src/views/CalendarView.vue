<script setup lang="ts">
import { ref } from 'vue';

const MOCK_EVENT = [
    {
        "name": "Jogar bola",
        "date": "2024-04-16"
    },
    {
        "name": "PASSEAR NO CAMPO",
        "date": "2024-04-20"
    },
    {
        "name": "LAVAR O CACHORRO",
        "date": "2024-04-20"
    },
]


const attrs = ref([
    {
        highlight: true,
        dates: [new Date()]
    },
    {

    }
]);

MOCK_EVENT.forEach((e) => {
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

const teste = (event: any) => {
    console.log(event);
};
</script>

<template>
    <main class="p-2 flex justify-center">
        <VCalendar @dayclick="teste" expanded color="blue" :attributes="attrs" />
    </main>
</template>