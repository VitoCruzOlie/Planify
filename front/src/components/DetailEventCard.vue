<script setup lang="ts">
import { PhTimer } from "@phosphor-icons/vue";

const props = defineProps<{
  title: string;
  date: string;
  hour: string;
  img: string;
  weekDay: string;
}>();
</script>
<template>
  <div
    class="flex flex-col items-center gap-2.5 hover:bg-neutral-100 transition-all group rounded-lg w-full"
  >
    <div class="gap-0.5 p-2 w-full">
      <div
        class="rounded-lg overflow-hidden w-full max-w-full h-56 max-h-56 min-w-full min-h-96 md:max-w-52 md:max-h-96  md:min-h-92"
      >
        <img
          class="group-hover:scale-105 transition-all object-cover w-full h-full "
          :src="props.img"
        />
      </div>
      <div class="w-full line-clamp-1 flex flex-col pt-2">
        <div class="flex flex-row w-full gap-3 items-center">
          <span class="text-black font-bold text-2xl"
            >{{ props.title }} -
          </span>
          <span class="text-primary font-bold text-2xl">{{ date }}</span>
        </div>
        <div class="flex flex-row gap-0.5 items-center">
          <PhTimer class="text-gray-500 text-lg" />
          <span class="text-gray-500 font-light text-sm line-clamp-1"
            >{{ weekDay }} às {{ hour }}</span
          >
        </div>
      </div>
    </div>
  </div>
</template>
