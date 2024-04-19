<script setup lang="ts">
import EditUserForm from '@/components/Forms/EditUserForm.vue';
import { PhUserCircle } from '@phosphor-icons/vue';
import NavBarBottom from '@/components/NavBarBottom.vue';
</script>
<template>
    <nav class="bg-primary text-white flex justify-center items-center h-20">
        <div class="flex flex-row gap-2 items-center">
            <PhUserCircle class="inline-block w-16 h-16"/>
            <p class="font-semibold text-2xl">Davi Ribeiro Souza</p>
        </div>
        
    </nav>
    <main class="w-full min-h-svh">
        <div class="p-10">
            <EditUserForm/>
        </div>
        <NavBarBottom/>
    </main>
</template>
