<script setup lang="ts">
import { PhMagnifyingGlass } from "@phosphor-icons/vue";
</script>
<template>
  <div class="relative">
    <div class="absolute inset-y-0 left-0 flex items-center pl-2 pointer-events-none">
      <PhMagnifyingGlass class="text-primary text-lg" />
    </div>
    <input
      placeholder="Pesquise por seus eventos criados..."
      class="pl-7 pr-2 py-2 border border-gray-300 placeholder:text-gray-500 rounded-lg text-xs"
      type="text"
    />
  </div>
</template>
