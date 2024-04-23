<script setup lang="ts">
import EditUserForm from '@/components/Forms/EditUserForm.vue';
import { PhUserCircle } from '@phosphor-icons/vue';
import NavBarBottom from '@/components/NavBarBottom.vue';

import { useStore } from 'vuex'
import { ref } from 'vue'

const store = useStore()

import { onMounted } from 'vue'

import { gsap } from "gsap";


// Animation
onMounted(() => {
  let timeline = gsap.timeline();
  timeline.to('.box', {x: "-100vh", duration: 0})
  timeline.to('.box', {x: "0vh", duration: 0.5})
})

let user = ref()

const loadData = async () => {
  try {
    const response = await store.dispatch('user/showUser')
    user.value = response
  } catch (error) {
    console.log(error)
  }
}

loadData()

</script>
<template>
  <div class="w-full flex flex-col justify-center items-center">

    <nav class="bg-primary text-white flex justify-center pl-3 items-center h-20 w-full">
        <div class="flex flex-row gap-2 items-center">
            <PhUserCircle class="inline-block w-16 h-16"/>
            <p class="font-semibold text-2xl">{{user?.name}}</p>
        </div>
        
    </nav>
    <main class="box w-full max-w-7xl min-h-svh">
        <div class="p-10">
            <EditUserForm/>
        </div>
    </main>
  </div>

    <NavBarBottom/>
</template>
