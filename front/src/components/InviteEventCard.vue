<script setup lang="ts">
import { PhCheckCircle } from '@phosphor-icons/vue';

const emit = defineEmits(['confirmInvite'])

const props = defineProps({
  imageUrl: String
})

const onConfirmInvite = () => {
  emit('confirmInvite')
}

</script>
<template>
  <div class="flex flex-col justify-start items-start gap-2.5 hover:bg-neutral-100 transition-all group rounded-lg">
    <div class="gap-0.5 p-2">
      <div class="rounded-lg overflow-hidden items-center justify-center gap-2.5 w-52 h-28 flex ">
        <img class="rounded-xl group-hover:scale-105 transition-all object-cover" :src="$props.imageUrl" />
      </div>
      <div class="w-full line-clamp-1 flex items-center pt-2">
        <div class="w-full line-clamp-1 flex flex-col pt-2">
          <slot name="date"></slot>
          <slot name="title"></slot>
        </div>
        <PhCheckCircle @click="onConfirmInvite" :size="50" color="#000000" />
      </div>
    </div>
  </div>
</template>
