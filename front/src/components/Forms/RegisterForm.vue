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
import { useStore } from 'vuex'

const emit = defineEmits(['alertError', 'alertSucess'])

// STORE
const store = useStore()

// ZOD
const schema = z.object({
  name: z.string().min(3, {
    message: "O nome deve possúir mais que três caracteres!",
  }),
  email: z.string().min(1, {
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
}).refine(data => data.password === data.confirmPassword, {
  message: "As senhas digitadas não coincidem!",
  path: ["confirmPassword"],
});

type Schema = z.infer<typeof schema>;

const form = useForm<Schema>({
  resolver: useZodResolver(schema),
});

// FORM HANDLER

const onSubmit = createSubmitHandler(async () => {
  try {
    await store.dispatch('user/register', form.getValues())
    emit('alertSucess')
  } catch (error) {
    emit('alertError')
  }
});
const onError = createErrorHandler((errors) => {
  emit('alertError')
});

</script>
<template>
  <form @submit.prevent="form.handleSubmit(onSubmit, onError)()" class="gap-8 flex flex-col px-10">
    <div class="gap-3 flex flex-col">
      <Input :="form.register('name')" placeholder="Nome" />
      <p class="text-red-600 font-medium text-sm">
        {{ form.formState.errors.name?.message }}
      </p>
      <Input :="form.register('email')" placeholder="Email" />
      <p class="text-red-600 font-medium text-sm">
        {{ form.formState.errors.email?.message }}
      </p>
      <Input :="form.register('password')" placeholder="Senha" />
      <p class="text-red-600 font-medium text-sm">
        {{ form.formState.errors.password?.message }}
      </p>
      <Input :="form.register('confirmPassword')" placeholder="Confirme a senha" />
      <p class="text-red-600 font-medium text-sm">
        {{ form.formState.errors.confirmPassword?.message }}
      </p>
    </div>
    <Button label="REGISTRAR" :variant="{ variant: 'primary' }" />
  </form>
</template>
