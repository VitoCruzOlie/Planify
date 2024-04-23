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
import { useRouter } from "vue-router";

const emit = defineEmits(['alertError', 'alertSucess'])

// STORE
const store = useStore()

// ROUTER
const router = useRouter()

// ZOD

const schema = z.object({

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
});

type Schema = z.infer<typeof schema>;

const form = useForm<Schema>({
  resolver: useZodResolver(schema),
});

const onSubmit = createSubmitHandler(async () => {
  try {
    await store.dispatch('user/login', form.getValues());
    emit('alertSucess')
    setTimeout(() => {
      router.push('/');
    }, 3000)
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

      <Input input-id="email" :="form.register('email')" type="text"  label="Email" />
      <p class="text-red-600 font-medium text-sm">
        {{ form.formState.errors.email?.message }}
      </p>
      <Input input-id="password" :="form.register('password')" type="password" label="Senha" />
      <p class="text-red-600 font-medium text-sm">
        {{ form.formState.errors.password?.message }}
      </p>

    </div>
    <Button label="LOGIN" :variant="{ variant: 'primary' }" />
  </form>
</template>
