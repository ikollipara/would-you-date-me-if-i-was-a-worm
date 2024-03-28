<script setup>
import { onMounted } from 'vue';
import { useForm } from '@inertiajs/vue3';
import Navbar from '../../Components/Navbar.vue';
const props = defineProps({
    worm: {
        type: Object,
        required: true,
    },
    match: {
        type: Object,
        required: true,
    },
});

const form = useForm({
    worm_id: null,
    match_id: null,
    worm_approved: null,
});


function canoodle() {
    form.worm_id = props.worm.id;
    form.match_id = props.match.id;
    form.worm_approved = true;
    form.post(`/worms/${props.worm.id}/matches`);
}

function slither() {
    form.worm_approved = false;
    form.post(`/worms/${worm.id}/matches`);
}

</script>

<template>
    <div>
        <Navbar :worm="worm" />
        <div v-if="match === null" class="bg-info my-32 rounded p-5 max-w-64 mx-auto">
            <p class="text-3xl text-center">Looks like there's no one to match!</p>
        </div>
        <div v-if="match" class="card card-side bg-base-100 shadow-xl">
            <figure class="px-10">
                <img :src="match.avatar_url" alt="Shoes" class="rounded-xl" />
            </figure>
            <div class="card-body items-center text-center">
                <h2 class="card-title">{{ match.name }} - {{ match.species }}</h2>
                <ul class=" list-inside list-disc">
                    <li>Age: {{ match.age }}</li>
                    <li>Number of Segments: {{ match.number_of_segments }}</li>
                    <li>Number of Hearts: {{ match.number_of_hearts }}</li>
                </ul>
                <h3 class="text-2xl mt-4">About Me</h3>
                <p v-html="match.about_me" class="pb-6"></p>
                <h3 class="text-2xl">Habitat</h3>
                <p v-html="match.habitat" class="pb-6"></p>
                <h3 class="text-2xl">Hobbies</h3>
                <p v-html="match.hobbies" class="pb-6"></p>
                <h3 class="text-2xl">Graditude</h3>
                <p v-html="match.graditude" class="pb-6"></p>
                <h3 class="text-2xl">Passion</h3>
                <p v-html="match.passion" class="pb-6"></p>
                <h3 class="text-2xl">Ideal Match</h3>
                <p v-html="match.ideal_match" class="pb-6"></p>
                <div class="card-actions">
                    <button @click="slither()" class="btn btn-primary btn-outline">Slither Away</button>
                    <button @click="canoodle()" class="btn btn-primary">Canoodle</button>
                </div>
            </div>
        </div>
    </div>
</template>
