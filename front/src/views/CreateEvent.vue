<script setup lang="ts">
//Component imports
import CreateEventForm from "@/components/Forms/CreateEventForm.vue";
import NavBarBottom from "@/components/NavBarBottom.vue";
import Toast from 'primevue/toast';

import { useToast } from 'primevue/usetoast';

const toast = useToast();

const showAlertError = () => {
  toast.add({ severity: 'error', summary: 'Erro', detail: 'Erro ao criar evento', life: 3000 });
};
const showAlertSucess = () => {
  toast.add({ severity: 'success', summary: 'Sucesso', detail: 'Evento criado com sucesso', life: 3000 });
};

</script>
<template>
  <nav class="w-full flex flex-row justify-between p-2 items-center border border-b-neutral-300 shadow-md shadow-black">
    <h1 class="text-primary text-xl font-bold">Planify</h1>
  </nav>
  <main class="w-full h-full bg-white mb-20">
    <Toast class="w-3/4" />
    <div class="w-full flex flex-col gap-7">
      <div class="flex flex-col gap-2 justify-center items-center text-center pt-16">
        <p class="font-bold text-xl">Criar Evento Online</p>
        <p class="font-light text-sm">
          Crie seus eventos online e personalizados
        </p>
      </div>
      <CreateEventForm @alertSucess="showAlertSucess" @alertError="showAlertError" />
    </div>
  </main>

  <NavBarBottom></NavBarBottom>
</template>
