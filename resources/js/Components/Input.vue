<script setup>
import { defineModel } from 'vue'
const props = defineProps({
    label: {
        type: String,
        required: true
    },
})
const model = defineModel({ required: true })
</script>

<template>
    <div>
        <label class="form-control w-full">
            <div class="label">
                <span class="label-text text-lg">{{ props.label }}</span>
            </div>
            <input v-bind="$attrs" v-model="model" class="input input-bordered w-full" />
            <!-- <div class="label">
                <span class="label-text-alt">Bottom Left label</span>
                <span class="label-text-alt">Bottom Right label</span>
            </div> -->
        </label>
    </div>
</template>
