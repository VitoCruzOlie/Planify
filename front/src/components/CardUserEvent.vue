<script setup></script>

<template>
    <div class="flex items-center w-4/4 h-16 bg-slate-300 rounded-2xl mt-4">
        <div class="w-1/5 h-16 bg-primary rounded-2xl"></div>
        <div class="ml-4">
            <slot name="tittle"></slot>
            <slot name="description"></slot>
        </div>
    </div>
</template>