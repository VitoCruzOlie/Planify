<script setup lang="ts">
import {
  Carousel,
  CarouselContent,
  CarouselItem,
} from "@/components/ui/carousel";

import EventCard from "../components/EventCard.vue";
import InviteEventCard from "../components/InviteEventCard.vue";
import Skeleton from 'primevue/skeleton';

import { ref } from 'vue';
import { useStore } from 'vuex'
import { useRouter } from "vue-router";

import Toast from 'primevue/toast';
import { useToast } from 'primevue/usetoast';

const toast = useToast();

const store = useStore();
const router = useRouter();

let events = ref([])
let invites = ref([])
let images = ref('https://picsum.photos/400/200')
let showInvites = ref(false)
let showSkeleton = ref(false)
let showSkeletonInvite = ref(false)
let showWithoutEvents = ref(false)

const loadData = async () => {
  try {
    showSkeleton.value = true
    await store.dispatch('event/getEvents')

    store.getters['event/userEvents'].forEach((e) => {
      events.value.push(e)
    })
    showSkeleton.value = false

    showSkeletonInvite.value = true
    showInvites.value = true
    await store.dispatch('event/getInvites')

    store.getters['event/invites'].forEach((e) => {
      invites.value.push(e)
    })

    showSkeletonInvite.value = false
    invites.value.length > 0 ? showInvites.value = true : showInvites.value = false

    if (!(events.value.length > 0) && !(invites.value.length > 0)) {
      showWithoutEvents.value = true
    }
  } catch (error) {
    console.log(error)
  }
}

loadData()

const confirmInvite = async (event) => {
  try {
    await store.dispatch('user/confirmInvite', event)
    toast.add({ severity: 'success', summary: 'Sucesso', detail: 'Evento confirmado!', life: 3000 })
    setTimeout(() => {
      window.location.reload();
    }, 3000)

  } catch (error) {
    console.log(error)
    toast.add({ severity: 'error', summary: 'Erro', detail: 'Erro ao confirmar evento', life: 3000 })
  }
}

const redirect = (id) => {
  router.push('/event-details/' + id)
}

</script>

<template>

  <Toast class="w-3/4" />
  <h1 v-if="showWithoutEvents" class="p-4">Nenhum evento disponível...</h1>
  <Carousel>
    <CarouselContent class="pl-2">
      <Skeleton v-if="showSkeleton" class="p-4 ml-4" width="50%" height="8rem" borderRadius="16px"></Skeleton>
      <Skeleton v-if="showSkeleton" class="p-4 ml-4" width="50%" height="8rem" borderRadius="16px"></Skeleton>
      <CarouselItem v-for="(event, index) in events" :key="index" class="basis-1/1" @click="redirect(event.id)">

        <EventCard :imageUrl="images">
          <template #title>
            <span class="text-black font-bold text-lg">{{ event.name }}</span>
          </template>
          <template #description>
            <span class="text-gray-500 font-light text-xs line-clamp-1">{{ event.description }}</span>
          </template>
          <template #date>
            <span class="text-primary font-bold text-xs">{{ event.date }}</span>
          </template>
        </EventCard>

      </CarouselItem>
    </CarouselContent>
  </Carousel>

  <h1 v-if="showInvites" class="p-4 text-stone-700 text-xl font-bold">Convites</h1>

  <Carousel>
    <CarouselContent class="pl-2">

      <Skeleton v-if="showSkeletonInvite" class="p-4 ml-4" width="50%" height="8rem" borderRadius="16px"></Skeleton>
      <Skeleton v-if="showSkeletonInvite" class="p-4 ml-4" width="50%" height="8rem" borderRadius="16px"></Skeleton>

      <CarouselItem v-for="(event, index) in invites" :key="index" class="sm:basis-1/2">

        <InviteEventCard @confirmInvite="confirmInvite(event.id)" :imageUrl="images">
          <template #title>
            <span class="text-black font-bold text-lg">{{ event.name }}</span>
          </template>
          <template #date>
            <span class="text-primary font-bold text-xs">{{ event.date }}</span>
          </template>
        </InviteEventCard>

      </CarouselItem>

    </CarouselContent>
  </Carousel>
</template>
