<script setup lang="ts">
import DetailEventCard from "@/components/DetailEventCard.vue";
import InviteParticipants from "@/components/InviteParticipants.vue";
import ActualParticipantSection from "@/components/ActualParticipantSection.vue";
</script>

<template>
  <nav>
    <div class="flex flex-row p-4 border-b-neutral-300 border">
      <h1 class="text-primary text-xl font-bold">Planify</h1>
    </div>
  </nav>
  <main class="w-full min-h-svh bg-white">
    <div class="gap-2.5 px-4 flex flex-col justify-center pb-4">
      <DetailEventCard title="Reunião Top" date="18/04/2024" hour="21:20" />
      <div class="pl-3 flex flex-col gap-4 pb-11">
        <div>
          <span class="text-sm font-semibold">ASSUNTO</span>
          <p class="text-neutral-500 text-xs">Reunião organizacional</p>
        </div>
        <div>
          <span class="text-sm font-semibold">DESCRIÇÃO DO EVENTO</span>
          <p class="text-neutral-500 text-xs line-clamp-4">
            Lorem Ipsum é simplesmente uma simulação de texto da indústria
            tipográfica e de impressos, e vem sendo utilizado desde o século
            XVI, quando um impressor desconhecido pegou uma bandeja.
          </p>
        </div>
      </div>
      <div class="mb-20" >
        <InviteParticipants />
      </div>
      <div>
      <ActualParticipantSection title="Atuais participantes" />
      </div>

    </div>
  </main>
</template>
