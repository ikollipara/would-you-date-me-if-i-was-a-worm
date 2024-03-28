<script setup>
import { useForm } from '@inertiajs/vue3';
import Input from '../Components/Input.vue';

const form = useForm({
    email: null,
});

function login() {
    form.post('/worms/find-by-email');
}

</script>

<template>
    <div class="hero min-h-screen bg-base-200">
        <div class="hero-content text-center">
            <div class="max-w-2xl">
                <h1 class="text-5xl font-bold">Would You Date Me If I Was a Worm?</h1>
                <p class="py-6 text-2xl">
                    Are you ready to worm your way into love? Introducing 'Would You Date Me If I Was A Worm?' -
                    the premier dating site connecting those with a passion for all things earthy and adventurous.
                    <br>
                    Join us and discover the joy of finding your perfect match, no matter how wiggly or wonderful they
                    may be!
                </p>
                <a :href="route('worms.create')" class="btn btn-primary text-2xl">Get Started</a>
                <div class="block">
                    <div class="inline-flex items-end">
                    <Input type="email" placeholder="Enter Email to Login" v-model="form.email" />
                    <button @click="login()" class="ml-2 btn btn-primary btn-outline">Login</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
