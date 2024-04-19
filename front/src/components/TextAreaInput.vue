<script setup lang="ts">
type Props = {
  label: string;
}; 
 const props = defineProps<Props>();

</script>
<template>
  <div class="h-fit w-full relative">
    <textarea
      id="input"
      class="flex flex-row gap-2 placeholder:text-neutral-500 border peer border-neutral-300 rounded-lg w-full focus:border-primary outline-none py-2.5 px-2"
      type="text"
    />

    <label
      for="input"
      class="absolute top-1/2 -translate-y-1/2 left-2 transition-all origin-left text-sm text-neutral-500  peer-focus:top-0 peer-focus:-translate-y-1/2 peer-focus:text-xs bg-white px-2 py-1 rounded-lg"
    >
      {{ props.label }}
    </label>
  </div>
</template>