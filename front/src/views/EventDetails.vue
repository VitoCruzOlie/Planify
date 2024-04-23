<script setup lang="ts">
import DetailEventCard from "@/components/DetailEventCard.vue";
import InviteParticipants from "@/components/InviteParticipants.vue";
import ActualParticipantSection from "@/components/ActualParticipantSection.vue";
import PendingParticipantSection from "@/components/PendingParticipantSection.vue";
import NavBarBottom from "../components/NavBarBottom.vue";

import { ref } from "vue";
import { useStore } from "vuex";
import { useRoute } from "vue-router";

import Skeleton from "primevue/skeleton";

import { DateFormatter } from "@internationalized/date";

const store = useStore();
const route = useRoute();

const df = new DateFormatter("pt-BR");

let event = ref();
let users = ref([]);
let images = ref("https://picsum.photos/400/200");
let weekDay = ref();
let showSkeleton = ref(false);

const loadData = async () => {
  try {
    showSkeleton.value = true;
    const id = route.params.id;
    const data = await store.dispatch("event/showEvent", id);

    event.value = data.events;
    users.value = data.users;

    const weekDate = new Date(event.value.date);
    weekDay.value = weekDate.toLocaleDateString("pt-BR", { weekday: "long" });

    event.value.date = df.format(new Date(event.value.date));
    showSkeleton.value = false;
  } catch (error) {
    showSkeleton.value = false;
  }
};

loadData();
</script>

<template>
  <Skeleton
    v-if="showSkeleton"
    class="p-4 ml-4 mt-4"
    width="90%"
    height="13rem"
    borderRadius="16px"
  ></Skeleton>
  <Skeleton
    v-if="showSkeleton"
    class="p-4 ml-4 mt-4"
    width="90%"
    height="2rem"
    borderRadius="16px"
  ></Skeleton>
  <Skeleton
    v-if="showSkeleton"
    class="p-4 ml-4 mt-4"
    width="30%"
    height="2rem"
    borderRadius="16px"
  ></Skeleton>
  <Skeleton
    v-if="showSkeleton"
    class="p-4 ml-4 mt-4"
    width="40%"
    height="2rem"
    borderRadius="16px"
  ></Skeleton>
  <Skeleton
    v-if="showSkeleton"
    class="p-4 ml-4 mt-4"
    width="90%"
    height="5rem"
    borderRadius="16px"
  ></Skeleton>
  <div class="justify-center items-center w-full  flex flex-col">
    <nav class="w-full">
      <div class="flex flex-row p-4 border-b-neutral-300 border">
        <RouterLink to="/">
          <h1 class="text-primary text-xl font-bold">Planify</h1>
        </RouterLink>
      </div>
    </nav>

    <main v-if="event" class="w-full min-h-svh bg-white pb-20 max-w-7xl">
      <div
        class="gap-2.5 px-4 flex flex-col justify-center pb-4 items-center w-full"
      >
        <DetailEventCard
          :weekDay="weekDay?.toUpperCase()"
          :img="images"
          :title="event.name"
          :date="event.date"
          :hour="event.time"
        />
        <div
          class="flex flex-col gap-4 pb-11 w-full items-start justify-start"
        >
          <div class="flex flex-col items-start justify-start">
            <div class="pl-2">
              <span class="text-sm font-semibold md:text-xl">ASSUNTO</span>
              <p class="text-neutral-500 text-xs">{{ event.subject }}</p>
            </div>
            <div class="pl-2">
              <span class="text-sm font-semibold md:text-xl"
                >DESCRIÇÃO DO EVENTO</span
              >
              <p class="text-neutral-500 text-xs line-clamp-4">
                {{ event.description }}
              </p>
            </div>
          </div>
        </div>
        <div class="mb-20">
          <InviteParticipants />
        </div>
        <div class="flex flex-col gap-8 w-full items-center justify-center">
          <ActualParticipantSection
            :participants="users.users_confirmed"
            title="Participantes atuais"
          />
          <PendingParticipantSection
            :participants="users.users_invited"
            title="Participantes pendentes"
          />
        </div>
      </div>
    </main>
  </div>

  <NavBarBottom />
</template>
