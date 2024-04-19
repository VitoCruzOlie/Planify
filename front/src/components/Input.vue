<script setup lang="ts">
import { defineProps } from "vue";

type Props = {
  label: string;
  inputId: string;
};

const props = defineProps<Props>();
</script>

<template>
  <div class="h-fit w-full relative">
    <input
      :id="props.inputId"
      type="text"
      class="peer h-10 w-full border-b-2 border-gray-300 text-gray-900 placeholder-transparent focus:outline-none focus:border-primary"
      placeholder="...."
    />
    <label
      :for="props.inputId"
      class="absolute left-0 -top-3.5 text-gray-600 text-sm transition-all peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-placeholder-shown:top-2 peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm"
      >{{props.label}}</label
    >
  </div>
</template>
