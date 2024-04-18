<script setup lang="ts">
import Input from "@/components/Input.vue";
import Button from "@/components/Button.vue";
import TextAreaInput from "@/components/TextAreaInput.vue";
import DateInput from "@/components/DateInput.vue";
import InputMask from "primevue/inputmask";

import {
  useForm,
  createErrorHandler,
  createSubmitHandler,
} from "@vue-hooks-form/core";
import { z } from "zod";
import { useZodResolver } from "@vue-hooks-form/zod";
import { useStore } from 'vuex'
import { useRouter } from "vue-router";

const emit = defineEmits(['alertError', 'alertSucess'])

// STORE
const store = useStore()

// ROUTER
// const router = useRouter()

const schema = z.object({
  eventName: z.string().min(3, {
    message: "Por favor, preencha o campo de nome do evento.",
  }),
  eventHour: z.string().min(4, {
    message: "Digite um horário válido",
  }),
  eventSubject: z.string().min(1, {
    message: "",
  }),
  eventDescription: z.string().min(1, {
    message: "",
  }),
});

type Schema = z.infer<typeof schema>;

const form = useForm<Schema>({
  resolver: useZodResolver(schema),
});

let date = ''


const onSubmit = createSubmitHandler(async () => {
  try {
    let event = {
      name: form.getValues().eventName,
      time: form.getValues().eventHour,
      date: date,
      subject: form.getValues().eventSubject,
      description: form.getValues().eventDescription,
    }

    await store.dispatch('event/createEvent', event)
    emit('alertSucess')
  } catch (error) {
    emit('alertError')
  }
});
const onError = createErrorHandler((errors) => {
  console.log(errors);
});

const teste = (event) => {
  date = event
}

//form.setValue('eventDate',  )
</script>
<template>
  <form @submit.prevent="form.handleSubmit(onSubmit, onError)()" class="gap-8 flex flex-col px-10">
    <div class="gap-3 flex flex-col">
      <Input :="form.register('eventName')" placeholder="Nome do evento" />
      <p class="text-red-600 font-medium text-sm">
        {{ form.formState.errors.eventName?.message }}
      </p>
      <DateInput @submitValue="teste" />
      <p class="text-red-600 font-medium text-sm">
      </p>
      <InputMask :="form.register('eventHour')" placeholder="Horário do evento" mask="99:99"
        class="flex flex-row gap-2 p-2 placeholder:text-neutral-500 text-sm border border-neutral-300 rounded-sm" />
      <p class="text-red-600 font-medium text-sm">
        {{ form.formState.errors.eventHour?.message }}
      </p>
      <Input :="form.register('eventSubject')" placeholder="Assunto" />

      <TextAreaInput :="form.register('eventDescription')" placeholder="Descrição" />
    </div>
    <Button class="text-2xl" label="CRIAR EVENTO" :variant="{ variant: 'primary' }" />
  </form>
</template>
