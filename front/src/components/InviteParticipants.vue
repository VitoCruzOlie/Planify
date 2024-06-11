<script setup lang="ts">
import Button from "./Button.vue";
import Combobox from "@/components/Combobox.vue";

import { ref } from 'vue';
import { useStore } from 'vuex'
import { useRoute } from "vue-router";

import Toast from 'primevue/toast';
import { useToast } from 'primevue/usetoast';

const toast = useToast()
const store = useStore()
const route = useRoute()

let users = ref()
let userEmail = ref()

const loadData = async () => {
  try {
    await store.dispatch('user/allUsers', route.params.id)

    users.value = store.getters['user/getUsers']
    console.log(users.value)
  } catch (error) {
    console.log(error)
  }
}

loadData()

// Update email value emited from combobox
const attEmailValue = (email) => {
  userEmail.value = email
}

// Invite and toast
const invite = async () => {
  try {
    await store.dispatch('user/invite', {
      email: userEmail.value,
      id: route.params.id
    })

    toast.add({ severity: 'success', summary: 'Sucesso', detail: 'Convite enviado!', life: 3000 })

    setTimeout(() => {
      window.location.reload();
    }, 3000)
  } catch (error) {
    toast.add({ severity: 'error', summary: 'Erro', detail: 'Erro ao enviar convite', life: 3000 });
    console.log(error)
  }
}

</script>
<template>
  <Toast class="w-3/4" />
  <div class="w-full">
    <div class="flex flex-col justify-center items-center gap-2 pb-3">
      <span class="font-semibold text-2xl">Convide participantes!</span>
      <span class="text-neutral-500 text-sm">Convide participantes para seu evento.</span>
    </div>

    <div class="flex flex-col justify-center items-center gap-3">
      <Combobox v-if="users" :participants="users" @attValue="attEmailValue" />
      <Button v-if="users" :variant="{ variant: 'primary' }" label="CONVIDAR" @click="invite" />
    </div>
  </div>
</template>
