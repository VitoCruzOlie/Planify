<script setup lang="ts">
import ParticipantCard from "./ParticipantCard.vue";
const props = defineProps<{
  title: string;
}>();
</script>

<template>
  <div
    class="relative py-6 px-3 bg-gray-50 shadow-md shadow-neutral-400 items-center justify-center rounded-lg"
  >
    <div class="pb-4">
      <p class="absolute top-0 left-0 ml-3 text-2xl font-bold">{{ props.title }}</p>
    </div>
    <div class="w-full flex flex-col gap-2">
      <ParticipantCard image="/cardimage.svg" v-for="index in 3" name="João Sem Braço" />
    </div>
  </div>
</template>
