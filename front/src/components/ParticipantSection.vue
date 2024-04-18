<script setup lang="ts">
const props = defineProps<{
  title: string;
 }>();
</script>


<template>
    <div class="p-10 bg-neutral-500 shadow-md shadow-black">
        <p class="text-lg ">{{ props.title }}</p>
        <div class="w-full flex flex-col gap-2">

        </div>
    </div>
</template>