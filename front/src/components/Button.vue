<script setup lang="ts">
defineProps({
  label: String,
})
</script>

<template>
    <button class="bg-transparent text-white font-bold py-2 px-4 rounded-lg border border-white">
        <label>{{ label }}</label>
    </button>
</template>