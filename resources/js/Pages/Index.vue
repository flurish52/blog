<template>
    <div>
        <NavBar :categories="props.categories"/>
        <div class="flex bg-slate-100 h-screen  px-12 flex-col w-full md:flex-row md:flex-wrap">
            <div
                class="card bg-slate-200 w-full shadow-md rounded-md h-fit m-4 p-4 flex justify-start items-start flex-col md:w-96"
                v-for="post in posts" :key="post.id">
                <h1 class="font-bold text-2xl">{{ post.postTitle }}</h1>
                <p class="italic font-light text-xs bg-black text-white px-1 py-px rounded-sm">By: {{ post.author }}</p>
                <p>{{ post.content.slice(0, 100) }}...</p>
                <div class="w-full">
                    <div class="flex w-1/2 justify-between items-center">
                        <Link :href="`show/${post.id}`"
                              class="flex rounded-md px-1 bg-green-500 w-fit justify-center items-center h-fit py-1 mx-1">
                            Read
                            More
                        </Link>
                        <Link :href="`edit/${post.id}`"
                              class="flex rounded-md px-1 bg-slate-500 w-6 justify-center items-center h-6 py-1 mx-1">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                 stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10"/>
                            </svg>
                        </Link>
                        <button @click="deleteItem(post.id)"
                                class=" flex rounded-md px-1 bg-red-500 w w-6 justify-center items-center h-6 py-1 mx-1">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                 stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0"/>
                            </svg>

                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<script setup>
import NavBar from "@/Components/NavBar.vue";
import {Link} from "@inertiajs/inertia-vue3";
import {defineProps} from "vue"
import axios from "axios";

let props = defineProps({
    posts: Array,
    categories: Array,
});
const deleteItem = (postId) => {

    axios.delete(`delete/${postId}`)
        .then(res => {
            if (res.status == '200') {
                location.reload()
            }
        })
        .catch(err => {
            console.log(err)
        })

}
</script>
