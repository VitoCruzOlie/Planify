<script setup lang="ts">
//Component imports
import CreateEventForm from "@/components/Forms/CreateEventForm.vue";
import NavBarBottom from "@/components/NavBarBottom.vue";
import Toast from "primevue/toast";

import { useToast } from "primevue/usetoast";

const toast = useToast();

import { onMounted } from 'vue'

import { gsap } from "gsap";

// Animation
onMounted(() => {
  let timeline = gsap.timeline();
  timeline.to('.box', {x: "-100vh", duration: 0})
  timeline.to('.box', {x: "0vh", duration: 0.5})
})

// Toast
const showAlertError = () => {
  toast.add({
    severity: "error",
    summary: "Erro",
    detail: "Erro ao criar evento",
    life: 3000,
  });
};
const showAlertSucess = () => {
  toast.add({
    severity: "success",
    summary: "Sucesso",
    detail: "Evento criado com sucesso",
    life: 3000,
  });
};
</script>
<template>
  <div class="w-full justify-center items-center flex flex-col">
    <nav
      class="w-full flex flex-row justify-between p-4 items-center"
    >
      <router-link to="/">
        <h1 class="text-primary text-xl font-bold">Planify</h1>
      </router-link>
    </nav>
    <main class="box w-full max-w-7xl min-h-svh bg-white mb-20 flex flex-col">
      <Toast class="w-3/4" />
      <div class="w-full flex flex-col gap-7">
        <div
          class="flex flex-col gap-2 justify-center items-center text-center pt-16"
        >
          <p class="font-bold text-xl">Criar Evento Online</p>
          <p class="font-light text-sm">
            Crie seus eventos online e personalizados
          </p>
        </div>
        <CreateEventForm
          @alertSucess="showAlertSucess"
          @alertError="showAlertError"
        />
      </div>
    </main>
  </div>

  <NavBarBottom></NavBarBottom>
</template>
