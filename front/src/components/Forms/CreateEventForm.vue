<script setup lang="ts">
import Input from "@/components/Input.vue";
import Button from "@/components/Button.vue";
import TextAreaInput from "@/components/TextAreaInput.vue";

import {
  useForm,
  createErrorHandler,
  createSubmitHandler,
} from "@vue-hooks-form/core";
import { z } from "zod";
import { useZodResolver } from "@vue-hooks-form/zod";

const schema = z.object({
 
  eventName: z.string().min(3,{
    message: "Por favor, preencha o campo de nome do evento.",
  }),

  eventDate: z.string().min(8, {
    message: "Digite uma data válida",
  }),
   eventHour: z.string().min(8, {
    message: "Digite um horário válido",
  }),
  eventSubject: z.string().min(3, {
    message: "Por favor, preencha o campo de assunto.",
  }),
  eventDescription: z.string().min(3, {
    message: "Por favor, preencha o campo de descrição.",
  }),

});

type Schema = z.infer<typeof schema>;

const form = useForm<Schema>({
  resolver: useZodResolver(schema),
});

const onSubmit = createSubmitHandler(() => {});
const onError = createErrorHandler((errors) => {
  console.log(errors);
});
</script>
<template>
  <form
    @submit.prevent="form.handleSubmit(onSubmit, onError)()"
    class="gap-8 flex flex-col px-10"
  >
    <div class="gap-3 flex flex-col">

      <Input :="form.register('eventName')" placeholder="Nome do evento" />
      <p class="text-red-600 font-medium text-sm">
        {{ form.formState.errors.eventName?.message }}
      </p>
      <Input :="form.register('eventDate')" placeholder="Data do evento" />
      <p class="text-red-600 font-medium text-sm">
        {{ form.formState.errors.eventDate?.message }}
      </p>
      <Input :="form.register('eventHour')" placeholder="Horário do evento" />
      <p class="text-red-600 font-medium text-sm">
        {{ form.formState.errors.eventHour?.message }}
      </p>
      <Input :="form.register('eventSubject')" placeholder="Assunto" />
      <p class="text-red-600 font-medium text-sm">
        {{ form.formState.errors.eventSubject?.message }}
      </p>
      <TextAreaInput :="form.register('eventDescription')" placeholder="Descrição" />
      <p class="text-red-600 font-medium text-sm">
        {{ form.formState.errors.eventDescription?.message }}
      </p>

    </div>
    <Button class="text-2xl" label="CRIAR EVENTO" :variant="{ variant: 'primary' }" />
  </form>
</template>
