<script setup lang="ts">
import CardUserEvent from "../components/CardUserEvent.vue";
import NavBarBottom from "../components/NavBarBottom.vue";

import Skeleton from "primevue/skeleton";

import { ref } from "vue";
import { useStore } from "vuex";
import { useRouter } from "vue-router";

const store = useStore();
const router = useRouter();

let attrs = ref([
  {
    highlight: true,
    dates: [new Date()],
  },
]);

let events = ref([]);

let showSkeleton = ref(false);

async function load() {
  try {
    showSkeleton.value = true;
    await store.dispatch("event/getEvents");

    if (store.getters["event/userEvents"]) {
      store.getters["event/userEvents"].forEach((e) => {
        let date = e.date;
        const [year, month, day] = date.split("-");

        attrs.value.push({
          dot: true,
          popover: {
            label: e.name,
            visibility: "hover",
            hideIndicator: true,
          },
          content: "blue",
          dates: [new Date(year, month - 1, day)],
        });

        events.value.push(e);
        showSkeleton.value = false;
        return;
      });
    }
    showSkeleton.value = false;
  } catch (error) {
    console.log(error);
  }
}

load();

const redirect = (id) => {
  router.push("/event-details/" + id);
};
</script>

<template>
  <div class="w-full items-center justify-center flex flex-col">
    <nav class="w-full flex flex-row justify-between p-4 items-center">
      <router-link to="/">
        <h1 class="text-primary text-xl font-bold">Planify</h1>
      </router-link>
    </nav>
    <main class="p-4 flex justify-center flex-col mb-20 w-full max-w-7xl">
      <VCalendar expanded color="blue" :attributes="attrs" />
      <section class="w-full items-center justify-center flex flex-col">
        <CardUserEvent
          class="w-full md:w-4/5"
          v-for="(event, index) in events"
          :key="index"
          @click="redirect(event.id)"
        >
          <template v-slot:tittle>
            <h1 class="text-black font-bold text-lg max-w-64 break-words">
              {{ event.name }}
            </h1>
          </template>
          <template v-slot:description>
            <p class="text-gray-500 text-sm">{{ event.description }}</p>
          </template>
        </CardUserEvent>
      </section>
      <Skeleton
        v-if="showSkeleton"
        class="mt-4"
        width="100%"
        height="4rem"
        borderRadius="16px"
      ></Skeleton>
      <Skeleton
        v-if="showSkeleton"
        class="mt-4"
        width="100%"
        height="4rem"
        borderRadius="16px"
      ></Skeleton>
      <Skeleton
        v-if="showSkeleton"
        class="mt-4"
        width="100%"
        height="4rem"
        borderRadius="16px"
      ></Skeleton>
    </main>
  </div>

  <NavBarBottom></NavBarBottom>
</template>
