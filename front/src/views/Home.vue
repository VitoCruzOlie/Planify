<script setup lang="ts">
import Button from "../components/Button.vue";
import SearchBar from "../components/SearchBar.vue";
import CTA from "../components/CTA.vue";
import HomeCarousel from "../components/HomeCarousel.vue";
import NavBarBottom from "../components/NavBarBottom.vue";

const isLogin = () => {
  if (localStorage.getItem("token")) return true;
  return false;
};

// store.dispatch('event/getAllEvents')
</script>
<template>
  <div class="flex flex-col justify-center items-center relative bg-white">
    <nav
      v-if="!isLogin()"
      class="w-full bg-primary justify-center items-center flex flex-col py-4 px-2 gap-2"
    >
      <div class="w-full text-white font-bold text-center">
        <span>Crie seus eventos com a Planify agora!<br /></span>
        <span>A melhor plataforma do Brasil. </span>
      </div>
      <div>
        <Button :variant="{ variant: 'outline' }" label="CRIE SEU EVENTO" />
      </div>
    </nav>
    <main class="w-full max-w-7xl min-h-svh">
      <div class="flex flex-row p-4 justify-between">
        <h1 class="text-primary text-xl font-bold">Planify</h1>
        <div class="  flex-row gap-2 hidden md:flex">
        <router-link to="/create-event">
          <Button
            class="px-2"
            :variant="{ variant: 'outline_secondary' }"
            label="EVENTS"
          />
        </router-link>
        <router-link to="/calendar">
          <Button
            class="px-2"
            :variant="{ variant: 'outline_secondary' }"
            label="CALENDAR"
          />
        </router-link>
      </div>
      </div>
      <div class="gap-2.5 px-4 flex justify-center pb-4">
        <SearchBar/>
      </div>
      <HomeCarousel v-if="isLogin()" />
      <div>
        <CTA v-if="!isLogin()" />
      </div>
    </main>
    <NavBarBottom v-if="isLogin()"></NavBarBottom>
  </div>
</template>
