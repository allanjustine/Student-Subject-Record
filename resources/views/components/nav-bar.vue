<template>
    <section class="bg-gray-800 shadow">
        <div class="wrapper flex">
            <div id="brand" class="text-lg text-gray-200 font-bold py-5" style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif">
                Student Subject Record
            </div>
            <nav class="main-nav py-2 mt-4 ml-auto">
                <Link class="main-link" href="/">Home</Link>
                <!-- <Link v-if="user" class="main-link" href="/users"
                    >Users</Link
                > -->
                <Link v-if="user" class="main-link" href="/students"
                    >Students</Link
                >
                <Link v-if="user" class="main-link" href="/subjects"
                    >Subjects</Link
                >
            </nav>
            <div class="flex p-2">
                <Link
                    v-if="!user"
                    class="ml-2 py-4 text-white font-semibold bg-gray-500 hover:bg-gray-600 text-black font-bold px-4 rounded-full"
                    href="/login"
                    >Log In</Link
                >
                <Link
                    v-if="user"
                    class="py-4 text-white font-semibold hover:bg-red-700 bg-red-500 px-2 rounded-full"
                    href="/logout"
                    method="post"
                    as="button"
                    >Log Out</Link
                >
            </div>
        </div>
    </section>
</template>

<script setup>
import { Link } from "@inertiajs/inertia-vue3";
import { defineProps } from "vue";

defineProps({
    user: "",
});
</script>
