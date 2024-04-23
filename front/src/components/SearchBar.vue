<script setup lang="ts">
import { PhMagnifyingGlass } from "@phosphor-icons/vue";
import { watch, ref } from 'vue'

const emit = defineEmits(['onSearch'])

let inputValue = ref("")

watch(inputValue, (newValue) => {
  // if (!newValue) {
  //   emit('onSearch', null)
  //   return
  // }
  emit('onSearch', newValue)
})

</script>
<template>
  <div class="h-fit w-full relative ">
    <div class="absolute inset-y-0 left-0 flex items-center pl-2 pointer-events-none">
      <PhMagnifyingGlass class="text-primary text-lg" />
    </div>
    <input
      v-model="inputValue"
      placeholder="Pesquise por seus eventos criados..."
      class="pl-7 pr-2 py-2 border border-gray-300 placeholder:text-gray-500 rounded-lg text-xs w-full max-h-10 min-h-10 outline-none focus:border-primary"
      type="text"
    />
  </div>
</template>
