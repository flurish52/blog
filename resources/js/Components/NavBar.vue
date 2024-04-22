<template>

    <h1 class="flex bg-slate-800 w-full rounded-lg h-20 text-white text-center justify-between items-center px-4">
        <span class="font-bold text-5xl flex items-center justify-center">Atuo</span>
        <button @click="displayMenu()" class="md:hidden" >
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                 stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M3.75 5.25h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5"/>
            </svg>

        </button>
        <ul class="w-fit md:flex justify-start md:justify-center md:items-center items-start w-1/2 rounded-md bg-slate-800"
        :class="isOpen ? 'hidden' : 'block' ">
            <li
                class=" w-32 flex py-4 mx-2 h-4 flex items-center justify-start md:justify-center">
                <Link href="/">
                    Home
                </Link>
            </li>
            <li v-for="(category, index) in props.categories"
                :key="index"
                class="w-32 flex py-4 mx-2 h-4 flex items-center justify-start md:items-center md:justify-center">
                <Link :href="`/category/${category.id}`">
                    {{ category.categories}}
                </Link>
            </li>
        </ul>
        <a href="/newpost"
           class="flex items-center justify-center">New Post</a>
    </h1>
</template>

<script setup>
import {Link} from "@inertiajs/inertia-vue3";
import {defineProps} from "vue"
import {ref} from "vue";

let props = defineProps({
    categories: Array
})
let isOpen = ref('false')
let displayMenu =() =>{
 isOpen.value = !isOpen.value
}

</script>


<style scoped>
    .block{
        position: absolute;
        left: 40%;
        top: 48px;
        padding: 10px 0;
       text-align: left;

    }
    .block li{
        width: 90%;
        padding: 18px;
    }
    .block li:hover{
        background: rgb(40 41 90);
    }
</style>
