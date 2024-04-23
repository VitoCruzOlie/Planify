<script setup>

import { onMounted } from 'vue'

import { gsap } from "gsap";

onMounted(() => {
  let timeline = gsap.timeline();
  timeline.to('.box', {x: "-100vh", duration: 0})
  timeline.to('.box', {x: "0vh", duration: 0.5})
})

</script>

<template>
    <div class="box flex items-center w-4/4 h-16 bg-slate-300 rounded-2xl mt-4">
        <div class="w-1/5 h-16 bg-primary rounded-2xl"></div>
        <div class="ml-4">
            <slot name="tittle"></slot>
            <slot name="description"></slot>
        </div>
    </div>
</template>