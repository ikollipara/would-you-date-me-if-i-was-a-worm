<script setup>
import { ref } from 'vue';
import { useForm } from '@inertiajs/vue3';
import Input from '../../Components/Input.vue';
import Editor from '../../Components/Editor.vue';
import FileInput from '../../Components/FileInput.vue';
import Navbar from '../../Components/Navbar.vue';

const form = useForm({
    email: '',
    name: '',
    species: '',
    age: 0,
    number_of_segments: 0,
    number_of_hearts: 0,
    about_me: '',
    habitat: '',
    hobbies: '',
    graditude: '',
    passion: '',
    ideal_match: '',
    avatar: null,
});
let step = ref(0);

function submit() {
    form.post('/worms');
}
</script>

<template>
    <Navbar />
    <div class="mx-32 flex flex-col gap-5 mt-12">
        <div v-show="form.hasErrors" class="bg-error p-3 rounded">
            <p v-for="error in form.errors" class="text-white text-lg">{{ error }}</p>
        </div>
        <ul class="steps">
            <li @click="step = 0" :class="step >= 0 && 'step-primary'" class="step">Email</li>
            <li @click="step = 1" :class="step >= 1 && 'step-primary'" class="step">Short Data</li>
            <li @click="step = 2" :class="step >= 2 && 'step-primary'" class="step">Long Data</li>
            <li @click="step = 3" :class="step >= 3 && 'step-primary'" class="step">Profile Picture</li>
        </ul>
        <section class="flex flex-col gap-5" v-show="step == 0">
            <Input v-model="form.email" label="Email" />
            <flex class="gap-3"><button @click="step++" class="btn btn-primary" :disabled="form.email === ''">Next</button></flex>
        </section>
        <section class="flex flex-col gap-5" v-show="step == 1">
            <Input v-model="form.name" label="Name" />
            <Input v-model="form.species" label="Species" class="italic" />
            <Input v-model="form.age" label="Age (In Days)" type="number" min="1" />
            <Input v-model="form.number_of_hearts" label="Number Of Hearts" type="number" min="5" max="5" />
            <Input v-model="form.number_of_segments" label="Number Of Segments" type="number" min="1" />
            <div class="flex gap-3">
                <button @click="step--" class="btn btn-primary">Previous</button>
                <button @click="step++" class="btn btn-primary" :disabled="form.name === '' && form.species === '' && form.age === 0 && form.number_of_hearts !== 5 && form.number_of_segments === 0">Next</button>
            </div>
        </section>
        <section class="flex flex-col gap-5" v-show="step == 2">
            <Editor label="About Me" v-model="form.about_me" />
            <Editor label="Habitat" v-model="form.habitat" />
            <Editor label="Hobbies" v-model="form.hobbies" />
            <Editor label="Gratitude" v-model="form.graditude" />
            <Editor label="Passion" v-model="form.passion" />
            <Editor label="Ideal Match" v-model="form.ideal_match" />
            <div class="flex gap-3">
                <button @click="step--" class="btn btn-primary">Previous</button>
                <button @click="step++" class="btn btn-primary">Next</button>
            </div>
        </section>
        <section class="flex flex-col gap-5" v-show="step == 3">
            <FileInput label="Profile Picture" v-model="form.avatar" accept="image/*"/>
            <progress v-if="form.progress" :value="form.progress.percentage" max="100">
                {{ form.progress.percentage }}%
            </progress>
            <button @click="submit()" class="btn btn-primary" :disabled="form.progress">Submit</button>
        </section>
    </div>
</template>
