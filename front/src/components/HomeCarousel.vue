<script setup lang="ts">
import {
  Carousel,
  CarouselContent,
  CarouselItem,
} from "@/components/ui/carousel";

import EventCard from "../components/EventCard.vue";
</script>

<template>
  <Carousel>
    <CarouselContent class="pl-2">
      <CarouselItem class="basis-1/2"><EventCard /></CarouselItem>
      <CarouselItem class="basis-1/2"><EventCard /></CarouselItem>
      <CarouselItem class="basis-1/2"><EventCard /></CarouselItem>
    </CarouselContent>
  </Carousel>
</template>
