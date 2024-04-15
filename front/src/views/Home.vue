<script setup lang="ts">
import Button from "../components/Button.vue";
</script>
<template>
  <nav class="w-full bg-primary justify-center items-center flex flex-col py-4 px-2 gap-2">
    <div class="w-full text-white font-bold text-center">
      <span> Crie seus eventos com a Planify agora. </span>
      <span> A melhor plataforma do Brasil! </span>
    </div>
    <div>
      <Button label="CRIE SEU EVENTO" />
    </div>
  </nav>
  <main class="w-full min-h-svh bg-white">
    <h1>Home</h1>
    <p>Welcome to the Home page</p>
  </main>
</template>
