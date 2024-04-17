<script setup lang="ts">
import Input from "@/components/Input.vue";
import Button from "@/components/Button.vue";

import {
  useForm,
  createErrorHandler,
  createSubmitHandler,
} from "@vue-hooks-form/core";
import { z } from "zod";
import { useZodResolver } from "@vue-hooks-form/zod";

const schema = z.object({
 
  email: z.string().min(1,{
    message: "Por favor, preencha o campo de email!",
  }).email({
    message: "O email informado não é válido",
  }),

  password: z.string().min(8, {
    message: "A senha não pode possuir menos que 8 caracteres!",
  }),
   confirmPassword: z.string().min(8, {
    message: "A senha não pode possuir menos que 8 caracteres!",
  })
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

      <Input :="form.register('email')" placeholder="Nome do evento" />
      <p class="text-red-600 font-medium text-sm">
        {{ form.formState.errors.email?.message }}
      </p>
      <Input :="form.register('email')" placeholder="Data do evento" />
      <p class="text-red-600 font-medium text-sm">
        {{ form.formState.errors.email?.message }}
      </p>
      <Input :="form.register('email')" placeholder="Horário do evento" />
      <p class="text-red-600 font-medium text-sm">
        {{ form.formState.errors.email?.message }}
      </p>
      <Input :="form.register('email')" placeholder="Assunto" />
      <p class="text-red-600 font-medium text-sm">
        {{ form.formState.errors.email?.message }}
      </p>
      <Input :="form.register('password')" placeholder="Descrição" />
      <p class="text-red-600 font-medium text-sm">
        {{ form.formState.errors.password?.message }}
      </p>

    </div>
    <Button class="text-2xl" label="CRIAR EVENTO" :variant="{ variant: 'primary' }" />
  </form>
</template>
