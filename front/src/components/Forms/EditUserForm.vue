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
import { useStore } from "vuex";
import Toast from "primevue/toast";

import { useToast } from 'primevue/usetoast';

import { useRouter } from "vue-router";

// STORE
const store = useStore()

const router = useRouter()

const toast = useToast();

// ZOD
const schema = z
  .object({
    name: z.string().min(3, {
      message: "O nome deve possúir mais que três caracteres!",
    }),
    email: z
      .string()
      .min(1, {
        message: "Por favor, preencha o campo de email!",
      })
      .email({
        message: "O email informado não é válido",
      }),

    password: z.string().min(8, {
      message: "A senha não pode possuir menos que 8 caracteres!",
    }),
    confirmPassword: z.string().min(8, {
      message: "A senha não pode possuir menos que 8 caracteres!",
    }),
  })
  .refine((data) => data.password === data.confirmPassword, {
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
    await store.dispatch("user/updateUser", form.getValues());

    toast.add({
      severity: "success",
      summary: "Sucesso",
      detail: "Usuário editado com sucesso",
      life: 3000,
    });
    setTimeout(() => {
      window.location.reload();
    }, 3000);
  } catch (error) {
    console.log(error);
    toast.add({
      severity: "error",
      summary: "Erro",
      detail: "Erro ao editar usuário",
      life: 3000,
    });
  }
});
const onError = createErrorHandler((errors) => {
  toast.add({
    severity: "error",
    summary: "Erro",
    detail: "Erro ao editar usuário",
    life: 3000,
  });
});

const logout = () => {
  localStorage.removeItem('token')
  toast.add({ severity: 'success', summary: 'Sucesso', detail: 'Usuário desconectado', life: 3000 });
  setTimeout(() => {
      router.push('/')
    }, 3000);
}
</script>
<template>
  <Toast class="w-3/4" />
  <form
    @submit.prevent="form.handleSubmit(onSubmit, onError)()"
    class="gap-8 flex flex-col px-10 md:px-60"
  >
    <div class="gap-3 flex flex-col">
      <Input
        :="form.register('name')"
        label="Nome"
        type="text"
        input-id="name"
      />
      <p class="text-red-600 font-medium text-sm">
        {{ form.formState.errors.name?.message }}
      </p>
      <Input
        :="form.register('email')"
        label="Email"
        type="text"
        input-id="email"
      />
      <p class="text-red-600 font-medium text-sm">
        {{ form.formState.errors.email?.message }}
      </p>
      <Input
        :="form.register('password')"
        label="Senha"
        type="password"
        input-id="password"
      />
      <p class="text-red-600 font-medium text-sm">
        {{ form.formState.errors.password?.message }}
      </p>
      <Input
        :="form.register('confirmPassword')"
        label="Confirme a senha"
        type="password"
        input-id="confirmPassword"
      />
      <p class="text-red-600 font-medium text-sm">
        {{ form.formState.errors.confirmPassword?.message }}
      </p>
    </div>
    <div class="w-full items-center justify-center flex  ">
      <Button
        class="text-xl md:w-1/2 md:text-2xl"
        label="SALVAR"
        :variant="{ variant: 'primary' }"
      />
    </div>
  </form>
  <div class="gap-8 flex flex-col px-10 mt-6">
    <Button @click="logout" class="" label="SAIR" :variant="{ variant: 'outline_secondary' }" />
  </div>
</template>
