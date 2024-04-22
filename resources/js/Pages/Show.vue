<template>
    <div class="flex justify-center items-center md:px-10">
        <div class="card w-full h-5 m-4 p-4 flex flex-col justify-start items-center">
        <button class="bg-black text-white flex self-start rounded-md px-1">
            <Link href="/"> < Home </Link>
        </button>
            <h1 class="font-bold text-3xl h-fit ">{{ post.postTitle }}</h1>
            <hr>
            <p class="bg-black text-white text-xs italic px-px">{{ post.author }}</p>
            <hr>
            <p class="flex justify-start items-start">{{ post.content}}</p>
        </div>
    </div>
</template>

<script setup>
import {defineProps} from "vue"
import {Link} from "@inertiajs/inertia-vue3";

defineProps({
    post: Object
});
</script>
