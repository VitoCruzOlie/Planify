<script setup lang="ts">
//Component imports
import RegisterForm from "@/components/Forms/RegisterForm.vue";
import Toast from 'primevue/toast';
import { useToast } from 'primevue/usetoast';

import { onMounted } from 'vue'

import { gsap } from "gsap";

onMounted(() => {
  let timeline = gsap.timeline();
  timeline.to('.box', {x: "-100vh", duration: 0})
  timeline.to('.box', {x: "0vh", duration: 0.5})
})

const toast = useToast();

const showAlertError = () => {
  toast.add({ severity: 'error', summary: 'Erro', detail: 'Erro ao criar uma conta', life: 3000 });
};
const showAlertSucess = () => {
  toast.add({ severity: 'success', summary: 'Sucesso', detail: 'Usuário criado com sucesso', life: 3000 });
};

</script>
<template>
  <nav class="w-full flex flex-row justify-between p-4 items-center">
    <h1 class="text-primary text-xl font-bold">Planify</h1>
    <RouterLink to="/login">
      <button class="font-bold text-xs">
        <p>Entrar</p>
      </button>
    </RouterLink>
  </nav>
  <main class="box w-full min-h-svh bg-white">
    <Toast class="w-3/4" />
    <div class="w-full flex flex-col gap-7">
      <div class="flex flex-col gap-2 justify-center items-center text-center pt-16">
        <p class="font-bold text-base">
          Crie uma conta para <br />
          iniciar sua experiência com Planify!
        </p>
        <p class="font-light text-sm">
          Faltam só mais alguns passos!<br />Nós também detestamos formulários.
        </p>
      </div>
      <RegisterForm @alertSucess="showAlertSucess" @alertError="showAlertError" />
    </div>
  </main>
</template>
