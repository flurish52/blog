<template>
    <div class="flex items-center justify-center w-full px-6">
        <div class="w-full h-screen">

            <a href="/">
            <button class="bg-green-500 text-white font-sm px-2 font-semibold rounded-md">Back
                </button>
            </a>
            <label for="title" class="flex justify-between w-full h-10 px-1 py-0.5 my-1">Title:
                <input
                    type="text" name="title"
                    v-model="form.title"
                    placeholder="Post title"
                    class="font-bold text-xl border-none outline-none bg-slate-50">
                <button class="bg-green-500 text-white font-sm px-2 font-semibold rounded-md"
                        @click="createPost()">Publish
                </button>
            </label><br>
            <label for="title" class="w-full h-10 px-1 py-0.5 my-1">Content:
                <textarea name=""
                          class="w-full h-1/2 border-none outline-none bg-slate-50"
                          v-model="form.content"
                          placeholder="Content goes here">

                </textarea>
            </label>
            <br>
            Primary Category:
            <select class="bg-slate-100"
                    v-model="form.primaryCategory">
                <option value="Select Category">Select Category</option>
                <option
                    v-for="(category, index) in props.categories"
                    :value="category.categories"
                    :key="index">
                    {{ category.categories }}
                </option>
            </select>
            <br>
            <label class="w-full h-10 px-1 py-0.5 my-1">Tags:
                <input
                    type="text" name="categories"
                    v-model="form.tags"
                    placeholder="tags"
                    class="font-sm border-none outline-none bg-slate-50">
            </label>
            <br>
            <select class="bg-slate-100"
                    v-model="form.author">
                <option value="Select Category">Select author</option>
                <option
                    v-for="(author, index) in props.authors"
                    :value="author.name"
                    :key="index">
                    {{ author.name }}
                </option>
            </select>
        </div>
    </div>
</template>

<script setup>
import {useForm} from "@inertiajs/inertia-vue3";
import {defineProps} from 'vue'
import axios from "axios";

let props = defineProps({
    categories: Object,
    authors: Array
})
let form = useForm({
    title: '',
    content: '',
    primaryCategory: 'Select Category',
    author: 'Select Author',
    tags: '',

});

const createPost = () => {
    let data = form;
    if (form.primaryCategory === '' && form.primaryCategory === 'Select Category') {
        alert('Please select a primamry category')
        return;
    }
        axios.post('/createpost', {data})
            .then(req => {
                if (req.status == 200) {
                    form.title = ''
                    form.content = ''
                    form.primaryCategory = 'Select Category'
                    form.tags = ''
                    form.author = 'Select Author'
                }

            })
            .catch(err => {
                console.log(err)

            })
}
</script>
