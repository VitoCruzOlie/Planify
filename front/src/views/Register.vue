<script setup lang="ts">
//Component imports
import RegisterForm from "@/components/Forms/RegisterForm.vue";
</script>
<template>
  <nav
    class="w-full flex flex-row justify-between p-2 items-center border border-b-neutral-300 shadow-md shadow-black"
  >
    <h1 class="text-primary text-xl font-bold">Planify</h1>
    <RouterLink to="/login">
      <button class="font-bold text-xs">
        <p>Entrar</p>
      </button>
    </RouterLink>
  </nav>
  <main class="w-full min-h-svh bg-white">
    <div class="w-full flex flex-col gap-7">
      <div
        class="flex flex-col gap-2 justify-center items-center text-center pt-16"
      >
        <p class="font-bold text-base">
          Crie uma conta para <br />
          iniciar sua experiência com Planify! 
        </p>
        <p class="font-light text-sm">
          Faltam só mais alguns passos!<br />Nós também detestamos formulários.
        </p>
      </div>
      <RegisterForm />
    </div>
  </main>
</template>
