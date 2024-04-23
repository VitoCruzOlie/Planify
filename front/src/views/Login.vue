<script setup lang="ts">
//Component imports
import LoginForm from "@/components/Forms/LoginForm.vue";
import Button from "@/components/Button.vue";
import Toast from 'primevue/toast';
import { useToast } from 'primevue/usetoast';

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
  toast.add({ severity: 'error', summary: 'Erro', detail: 'Email ou senha incorretos', life: 3000 });
};
const showAlertSucess = () => {
  toast.add({ severity: 'success', summary: 'Sucesso', detail: 'Usuário logado com sucesso', life: 3000 });
};

</script>
<template>
  <nav class="w-full flex flex-row justify-between p-4 items-center">
    <h1 class="text-primary text-xl font-bold">Planify</h1>
  </nav>
  <main class="box w-full min-h-svh bg-white">
    <Toast class="w-3/4" />
    <div class="w-full flex flex-col gap-7">
      <div class="flex flex-col gap-2 justify-center items-center text-center pt-16">
        <p class="font-bold text-base">Entre na sua conta!</p>
        <p class="font-light text-sm">
          só mais alguns cliques!<br />Nós também detestamos formulários.
        </p>
      </div>
      <LoginForm @alertSucess="showAlertSucess" @alertError="showAlertError" />
      <RouterLink class="gap-8 flex flex-col px-10" to="/register">
        <Button label="NÃO POSSUI UMA CONTA?" :variant="{ variant: 'outline_secondary' }" />
      </RouterLink>
    </div>
  </main>
</template>
