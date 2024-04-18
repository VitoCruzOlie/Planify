<script setup lang="ts">
import { PhTimer } from "@phosphor-icons/vue";

const props = defineProps<{
  title: string;
  date: string;
  hour: string;
}>();
</script>
<template>
  <div
    class="flex flex-col items-center gap-2.5 hover:bg-neutral-100 transition-all group rounded-lg"
  >
    <div class="gap-0.5 p-2">
      <div
        class="rounded-lg overflow-hidden items-center justify-center gap-2.5 w-80 h-52 flex"
      >
        <img
          class="group-hover:scale-105 transition-all object-cover w-full h-full"
          src="/cardimage.svg"
        />
      </div>
      <div class="w-full line-clamp-1 flex flex-col pt-2">
        <div class="flex flex-row w-full gap-3 items-center">
          <span class="text-black font-bold text-2xl"
            >{{ props.title }} -
          </span>
          <span class="text-primary font-bold text-2xl">{{date}}</span>
        </div>
        <div class="flex flex-row gap-0.5 items-center">
          <PhTimer class="text-gray-500 text-lg"/>
          <span class="text-gray-500 font-light text-sm line-clamp-1"
            >Quinta às {{ hour }}</span
          >
        </div>
      </div>
    </div>
  </div>
</template>
