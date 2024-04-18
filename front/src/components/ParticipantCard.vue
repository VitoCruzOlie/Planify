<script setup lang="ts">
const props = defineProps<{
  name: string;
  image:string;
}>();
</script>
<template>
    <div class="flex flex-row gap-2 items-center">
        <div class="rounded-full overflow-hidden items-center justify-center gap-2.5 size-10 max-w-10 max-h-10 min-w-10 min-h-10 flex border border-neutral-500">
        <img :src="props.image" class="w-full h-full object-cover"/>
        </div>
        <p class="text-neutral-500 text-sm font-semibold">{{ props.name }}</p>
    </div>
</template>