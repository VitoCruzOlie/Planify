<script setup lang="ts">
//Component imports
import Input from "@/components/Input.vue";
import Button from "@/components/Button.vue";
//<p class="font-bold text-base  ">Crie uma conta para <br> iniciar sua experiência com Planify!</p>
//<p class="font-light text-sm "> Faltam só mais alguns passos!<br>Nós também detestamos formulários.</p>
</script>
<template>
  <nav
    class="w-full flex flex-row justify-between p-2 items-center border border-b-neutral-300 shadow-md shadow-black"
  >
    <h1 class="text-primary text-xl font-bold">Planify</h1>
    <button class="font-bold text-xs">
      <p>Entrar</p>
    </button>
  </nav>
  <main class="w-full min-h-svh bg-white">
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
      <form class="gap-8 flex flex-col px-10 ">
        <div class="gap-3 flex flex-col">
          <Input />
          <Input />
          <Input />
        </div>
        <Button label="REGISTRAR" :variant="{ variant: 'primary' }" />
      </form>
    </div>
  </main>
</template>
