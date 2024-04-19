<script setup lang="ts">
import { ref } from 'vue'
import { Check, ChevronsUpDown } from 'lucide-vue-next'

import { cn } from '@/lib/utils'
import { Button } from '@/components/ui/button'
import {
  Command,
  CommandEmpty,
  CommandGroup,
  CommandInput,
  CommandItem,
  CommandList,
} from '@/components/ui/command'
import {
  Popover,
  PopoverContent,
  PopoverTrigger,
} from '@/components/ui/popover'

const participants = [
  { value: 'Victor', label: 'vito@gmail.com' },
  { value: 'Davi', label: 'davi@gmail.com' },
  { value: 'João Sem Braço', label: 'jaosembraco@gmaol.com' },
  { value: 'Maria Sem Perna', label: 'mariasemperna@gmail.com' },
  { value: 'Roberto', label: 'roberto@gmail.com' },
]

const open = ref(false)
const value = ref('')
</script>

<template>
  <Popover v-model:open="open">
    <PopoverTrigger as-child>
      <Button
        variant="outline"
        role="combobox"
        :aria-expanded="open"
        class="w-[200px] justify-between"
      >
        {{ value
          ? participants.find((participant) => participant.value === value)?.label
          : "Adicione um participante" }}
        <ChevronsUpDown class="ml-4 h-4 w-4 shrink-0 opacity-50" />
      </Button>
    </PopoverTrigger>
    <PopoverContent class="w-[200px] p-0">
      <Command>
        <CommandInput class="h-9" placeholder="Adicionar participante" />
        <CommandEmpty>Nenhum participante encontrado</CommandEmpty>
        <CommandList>
          <CommandGroup>
            <CommandItem
              v-for="participant in participants"
              :key="participant.value"
              :value="participant.value"
              @select="(ev) => {
                if (typeof ev.detail.value === 'string') {
                  value = ev.detail.value
                }
                open = false
              }"
            >
              {{ participant.label }}
              <Check
                :class="cn(
                  'ml-auto h-4 w-4',
                  value === participant.value ? 'opacity-100' : 'opacity-0',
                )"
              />
            </CommandItem>
          </CommandGroup>
        </CommandList>
      </Command>
    </PopoverContent>
  </Popover>
</template>