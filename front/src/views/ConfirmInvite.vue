<script setup lang="ts">

import { useRouter, useRoute } from 'vue-router';
import { useStore } from 'vuex'

const router = useRouter();
const route = useRoute();
const store = useStore();

const isLogin = async () => {
    if (!localStorage.getItem("token")) {
        router.push('/login');
        return
    }
    try {
        await store.dispatch('user/confirmInvite', route.params.id)
        console.log(1111111)
    } catch (error) {
        console.log(error)
    }
}

isLogin()

const redirect = () => {
    router.push('/')
}

</script>

<template>
    <main class="bg-slate-200 h-screen flex flex-col space-y-56 items-center">
        <div class="flex flex-row p-4">
            <h1 class="text-primary text-xl font-bold">Planify</h1>
        </div>
        <div class="bg-primary text-zinc-50 h-56 flex flex-col items-center justify-end items-end  w-3/4 rounded">
            <div class="text-black bg-white w-full h-32 rounded flex flex-col justify-center items-center">
                <h1 class="text-primary text-xl">Tudo certo!</h1>
                <p>Evento confirmado</p>
                <button @click="redirect" class="bg-primary text-white w-2/4 h-12 rounded mt-2">Home</button>
            </div>
        </div>
    </main>
</template>