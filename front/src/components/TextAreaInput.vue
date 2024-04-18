<script setup lang="ts">
type Props = {
  placeholder: string;
}; 
 const props = defineProps<Props>();

</script>
<template>
  <textarea
    class="flex flex-row gap-2 p-2  placeholder:text-neutral-500 text-sm border border-neutral-300 rounded-sm "
    type="text"
    :placeholder="props.placeholder"
  />
</template>