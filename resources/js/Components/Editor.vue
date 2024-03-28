<script setup>
import '@vueup/vue-quill/dist/vue-quill.snow.css';
import { QuillEditor } from '@vueup/vue-quill';
import { defineModel } from 'vue';
const props = defineProps({
    label: { type: String, required: true }
})
const model = defineModel({ required: true })
</script>
<template>
    <label class="form-control w-full h-60">
        <div class="label"><span class="label-text text-lg">{{ label }}</span></div>
        <QuillEditor v-model:content="model" content-type="html" theme="snow" />
    </label>
</template>
