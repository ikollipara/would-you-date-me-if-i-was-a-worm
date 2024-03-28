<script setup>
import { defineModel } from 'vue';
const props = defineProps({
    label: {
        type: String,
        required: true
    },
})
const model = defineModel({ required: true })
</script>

<template>
    <label class="form-control w-full">
  <div class="label">
    <span class="label-text text-lg">{{ props.label }}</span>
  </div>
  <input v-bind="$attrs" type="file" class="file-input file-input-bordered w-full" @input="model = $event.target.files[0]" />
</label>
</template>
