<script setup>
import Navbar from '../../Components/Navbar.vue';
defineProps({
    worm: {
        type: Object,
        required: true
    }
})
</script>

<template>
    <Navbar :worm="worm" />
    <div class="hero min-h-screen bg-base-200">
        <div class="hero-content flex-col lg:flex-row">
            <img :src="worm.avatar_url"
                class="max-w-sm rounded-lg shadow-2xl" />
            <div>
                <h1 class="text-5xl font-bold">{{ worm.name }} - {{ worm.species }}</h1>
                <ul class=" list-inside list-disc">
                    <li>Age: {{ worm.age }}</li>
                    <li>Number of Segments: {{ worm.number_of_segments }}</li>
                    <li>Number of Hearts: {{ worm.number_of_hearts }}</li>
                </ul>
                <h3 class="text-2xl mt-4">About Me</h3>
                <p v-html="worm.about_me" class="pb-6"></p>
                <h3 class="text-2xl">Habitat</h3>
                <p v-html="worm.habitat" class="pb-6"></p>
                <h3 class="text-2xl">Hobbies</h3>
                <p v-html="worm.hobbies" class="pb-6"></p>
                <h3 class="text-2xl">Graditude</h3>
                <p v-html="worm.graditude" class="pb-6"></p>
                <h3 class="text-2xl">Passion</h3>
                <p v-html="worm.passion" class="pb-6"></p>
                <h3 class="text-2xl">Ideal Match</h3>
                <p v-html="worm.ideal_match" class="pb-6"></p>
            </div>
        </div>
    </div>
</template>
