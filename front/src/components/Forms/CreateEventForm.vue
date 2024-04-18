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
import { DateValue } from "@internationalized/date";

const schema = z.object({
  eventName: z.string().min(3, {
    message: "Por favor, preencha o campo de nome do evento.",
  }),

  eventDate: z.coerce.date(

  ),
  eventHour: z.string().min(4, {
    message: "Digite um horário válido",
  }),
});

type Schema = z.infer<typeof schema>;

const form = useForm<Schema>({
  resolver: useZodResolver(schema),
});

const onSubmit = createSubmitHandler((batata) => {
  console.log(batata)
});
const onError = createErrorHandler((errors) => {
  console.log(errors);
});

function handleCalendar(dateValue:DateValue){
  form.setValue("eventDate", dateValue.toString());
  console.log(dateValue.toString());
}


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
      <DateInput :onChange="handleCalendar"  />
      <p class="text-red-600 font-medium text-sm">
        {{ form.formState.errors.eventDate?.message }}
      </p>
      <InputMask
        :="form.register('eventHour')"
        placeholder="Horário do evento"
        mask="99:99"
        class="flex flex-row gap-2 p-2 placeholder:text-neutral-500 text-sm border border-neutral-300 rounded-sm"
      />
      <p class="text-red-600 font-medium text-sm">
        {{ form.formState.errors.eventHour?.message }}
      </p>
      <Input placeholder="Assunto" />

      <TextAreaInput placeholder="Descrição" />
    </div>
    <Button
      class="text-2xl"
      label="CRIAR EVENTO"
      :variant="{ variant: 'primary' }"
    />
  </form>
</template>
