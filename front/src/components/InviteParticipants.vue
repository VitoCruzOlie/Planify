<script setup lang="ts">
import Button from '@/components/Button.vue';
import Combobox from '@/components/Combobox.vue';
</script>
<template>
    <div class="w-full flex flex-col justify-center items-center">
        <span class="font-semibold text-2xl">Convide participantes!</span>
        <span class="text-neutral-500 text-sm">Convide participantes para seu evento.</span>
        <Combobox/>
    </div>
</template>