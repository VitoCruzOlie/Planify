<script setup lang="ts">
//Library imports
import { tv, type VariantProps } from "tailwind-variants";

const button = tv({
  base: "font-bold py-2 px-4 rounded-lg transition-all",
  variants: {
    variant: {
      primary: "bg-primary text-white hover:brightness-110",
      outline: "bg-transparent text-white border border-white hover:border-white/50 hover:text-white/50",
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
    <span>{{ label }}</span>
  </button>
</template>
