<script setup lang="ts">import Button from './Button.vue';</script>
<template>
    <div class="p-2 flex flex-col justify-center items-center gap-1">
        <div class="gap-2.5 flex flex-col justify-center items-center rounded-lg overflow-hidden w-60 h-32 ">
            <img src="/Screenshot.jpeg" />
        </div>
        <p class="font-bold text-base">Criar uma agenda?</p>
        <div class="font-light text-gray-500 gap-2.5 flex flex-row text-xs text-center">
            <span>Entre com sua conta no Planify <br> e veja as recomendações.</span>
        </div>
        <Button :variant="{variant:'primary'}" label="ACESSE SUA CONTA"/>
    </div>
</template>