<script setup lang="ts">
import Button from "./Button.vue";
import Combobox from "@/components/Combobox.vue";
</script>
<template>
  <div class="w-full">
    <div class="flex flex-col justify-center items-center gap-2 pb-3" >
      <span class="font-semibold text-2xl">Convide participantes!</span>
      <span class="text-neutral-500 text-sm"
        >Convide participantes para seu evento.</span
      >
    </div>

    <div class="flex flex-col justify-center items-center gap-3">
      <Combobox />
      <Button :variant="{ variant: 'primary' }" label="CONVIDAR" />
    </div>
  </div>
</template>
