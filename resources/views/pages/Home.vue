<template layout>
    <div
        class="container mx-auto p-4"
        style="
            background-image: url('/images/bg.jpg');
            background-repeat: no-repeat;
            background-size: cover;
        "
    >
        <div class="text-right mb-8">
            <h1 class="float-right bg-gray-200 px-2 rounded"></h1>
        </div>
        <div class="min-h-screen flex items-center justify-center text-white">
            <div
                class="max-w-4xl text-center bg-gray-700 bg-opacity-50 shadow-lg rounded-lg overflow-hidden"
                style="margin-top: -150px"
            >
                <div class="p-4">
                    <h1 class="text-4xl font-bold mb-4">
                        Welcome |
                        {{ auth.user ? auth.user.fullname : "Guest" }}!
                    </h1>
                    <p class="text-xl mb-4">Subject Overview</p>
                    <p class="mb-4">
                        Subject descriptions provide a synopsis of the subject
                        matter and requirements. Careful attention to detail
                        will reduce your workload and ensure that your listings
                        are up-to-date.
                        <br />
                        The subject of a sentence is the person, place, or thing
                        that is performing the action of the sentence. The
                        subject represents what or whom the sentence is about.
                        The simple subject usually contains a noun or pronoun
                        and can include modifying words, phrases, or clauses.
                    </p>
                    <div class="grid grid-cols-2">
                        <u
                            ><p class="text-xl">
                                Total Students:
                                <strong
                                    ><i>{{ totalStudents }}</i></strong
                                >
                            </p>
                        </u>
                        <u>
                            <p class="text-xl">
                                Total Subjects:
                                <strong
                                    ><i>{{ totalSubjects }}</i></strong
                                >
                            </p></u
                        >
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { Link, usePage } from "@inertiajs/inertia-vue3";

const props = defineProps({
    auth: Array,
    totalStudents: Number,
    totalSubjects: Number,
});

const user = usePage().props.auth;

console.log(user);
</script>
