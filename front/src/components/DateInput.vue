<script setup lang="ts">
import { Calendar as CalendarIcon } from 'lucide-vue-next'

import { ref, watch } from 'vue'
import { cn } from '@/lib/utils'
import { Button } from '@/components/ui/button'
import { Calendar } from '@/components/ui/calendar'
import {
  Popover,
  PopoverContent,
  PopoverTrigger,
} from '@/components/ui/popover';

import {
  DateFormatter,
  type DateValue,
  getLocalTimeZone,
} from '@internationalized/date'

const df = new DateFormatter('pt-BR', {
  dateStyle: 'long',
});

type Props = {
  onChange: (value: DateValue) => void,
}

const props = defineProps<Props>();

const value = ref<DateValue>();

watch(value, (newValue) => {
  if(newValue){
    props.onChange(newValue);
  }
});

</script>

<template>
  <Popover>
    <PopoverTrigger as-child>
      <Button
        :variant="'outline'"
        :class="cn(
          'flex flex-row gap-2 p-2  placeholder:text-neutral-500 text-sm border border-neutral-300 rounded-sm justify-start',
          !value && 'text-muted-foreground',
        )"
      >
        <CalendarIcon class=" h-4 w-4" />
        <span>{{ value ? df.format(value.toDate(getLocalTimeZone())) : "Selecione uma data" }}</span>
      </Button>
    </PopoverTrigger>
    <PopoverContent class="w-auto p-0">
      <Calendar v-model="value" />
    </PopoverContent>
  </Popover>
</template>