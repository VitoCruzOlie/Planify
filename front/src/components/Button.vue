<script setup lang="ts">
//Library imports
import { tv, type VariantProps } from "tailwind-variants";

const button = tv({
  base: "font-bold py-2 px-4 rounded-lg",
  variants: {
    variant: {
      primary: "bg-primary text-white",
      outline: "bg-transparent text-white border border-white",
    },
  },
});

type Variants = VariantProps<typeof button>;
type Props = {
  variant: Variants;
  label: string;
};
const props = defineProps<Props>();
</script>

<template>
  <button
    :class="
      button({
        variant: props.variant.variant,
      })
    "
  >
    <label>{{ label }}</label>
  </button>
</template>
