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
import { useStore } from "vuex";
import { useRouter } from "vue-router";

const emit = defineEmits(["alertError", "alertSucess"]);

// STORE
const store = useStore();

// ROUTER
const router = useRouter();

const schema = z.object({
  eventName: z.string().min(3, {
    message: "Por favor, preencha o campo de nome do evento.",
  }),

  eventDate: z.coerce
    .date({
      description: "Digite uma data válida",
      errorMap: (issue, _ctx) => {
        if (issue.code === "invalid_type") {
          return { message: "Digite uma data válida" };
        }
        return { message: "Digite uma data válida" };
      },
    })
    .refine(
      (date) => {
        return date > new Date();
      },
      {
        message: "Digite uma data futura",
      }
    ),

  eventHour: z.string().min(4, {
    message: "Digite um horário válido",
  }),
  eventSubject: z.string().min(0, {
    message: "",
  }),
  eventDescription: z.string().min(0, {
    message: "",
  }),
});

type Schema = z.infer<typeof schema>;

const form = useForm<Schema>({
  resolver: useZodResolver(schema),
});

const onSubmit = createSubmitHandler(async () => {
  try {
    let event = {
      name: form.getValues().eventName,
      time: form.getValues().eventHour,
      date: form.getValues().eventDate,
      subject: form.getValues().eventSubject,
      description: form.getValues().eventDescription,
    };

    const response = await store.dispatch("event/createEvent", event);
    
    emit("alertSucess");
    setTimeout(() => {
      router.push("/event-details/" + response.id)
    }, 3000);
  } catch (error) {
    emit("alertError");
  }
});
const onError = createErrorHandler(() => {
  emit("alertError");
});

function handleCalendar(dateValue: DateValue) {
  form.setValue("eventDate", dateValue.toString());
  console.log(dateValue.toString());
}
</script>
<template>
  <form @submit.prevent="form.handleSubmit(onSubmit, onError)()" class="gap-3 flex flex-col px-10">
    <div class="gap-5 flex flex-col">
      <Input :="form.register('eventName')" label="Nome do evento" input-id="eventName" />
      <p class="text-red-600 font-medium text-sm">
        {{ form.formState.errors.eventName?.message }}
      </p>
      <div class="pb-5">
        <Input :="form.register('eventSubject')" label="Assunto" input-id="Assunto" />
      </div>

      <div class="pb-5">
        <TextAreaInput :="form.register('eventDescription')" label="Descrição" input-id="Descrição" />
      </div>

      <InputMask :="form.register('eventHour')" placeholder="20:00" mask="99:99"
        class="h-10 w-full border-b-2 border-gray-300 placeholder-neutral-400 focus:outline-none focus:border-primary px-2.5" />
      <p class="text-red-600 font-medium text-sm">
        {{ form.formState.errors.eventHour?.message }}
      </p>

      <DateInput :onChange="handleCalendar" />
      <Input :="form.register('eventDate')" class="hidden" input-id="eventDate" />
      <p class="text-red-600 font-medium text-sm">
        {{ form.formState.errors.eventDate?.message }}
      </p>
    </div>
    <Button class="text-2xl" label="CRIAR EVENTO" :variant="{ variant: 'primary' }" />
  </form>
</template>
