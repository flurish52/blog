<template>
    <div class="flex  flex-col justify-center items-center md:px-10 w-full px-6">
        <h1 class="font-bold text-3xl h-fit">Edit post</h1>
        <br>
        <hr class="bg-red-50">

        <form class="flex flex-col w-full h-full" @submit.prevent="submit">
            <input
                type="text"
                v-model="post.postTitle"
                placeholder="Type here..."
                class="font-bold text-3xl h-fit ">

            <input type="text"
                   v-model="post.author"
                   placeholder="Type here..."
                   class="outline-none bg-black text-white text-xs italic px-px max-w-fit"
                   readonly>
            <br>
            <textarea
                type="text"
                class="h-full w-full outline-none"
                v-model="post.content"
                placeholder="Type here...">
            </textarea>
            <input
                type="submit"
                value="Update post"
                class="bg-slate-800 w-fit px-2 rounded-md flex self-center text-white">
        </form>

    </div>
</template>

<script setup>

import {app, defineProps} from "@inertiajs/inertia-vue3";
import axios from "axios";

let props = defineProps({
        post: Object
    }
)
let data = ''
const submit = () => {
    let data = props.post
    axios.put(`/update/${props.post.id}`, {data})
        .then(req =>{
            if (req.status == 200){
                console.log(data)

            }


        })
        .catch(err=>{
            console.log(err)
        })
}
</script>
