<script setup lang="ts">
//Component imports
import LoginForm from "@/components/Forms/LoginForm.vue";
import Button from "@/components/Button.vue";
</script>
<template>
  <nav
    class="w-full flex flex-row justify-between p-2 items-center border border-b-neutral-300 shadow-md shadow-black"
  >
    <h1 class="text-primary text-xl font-bold">Planify</h1>
  </nav>
  <main class="w-full min-h-svh bg-white">
    <div class="w-full flex flex-col gap-7">
      <div
        class="flex flex-col gap-2 justify-center items-center text-center pt-16"
      >
        <p class="font-bold text-base">Entre ma sua conta!</p>
        <p class="font-light text-sm">
          só mais alguns cliques!<br />Nós também detestamos formulários.
        </p>
      </div>
      <LoginForm />
      <RouterLink class="gap-8 flex flex-col px-10" to="/register">
        <Button
          label="NÃO POSSUI UMA CONTA?"
          :variant="{ variant: 'outline_secondary' }"
        />
      </RouterLink>
    </div>
  </main>
</template>
