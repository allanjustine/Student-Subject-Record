<template layout="default">
    <div
        class="container bg-gray-900 border border-gray-600 w-[500px] text-center shadow p-10 mx-auto mt-5"
    >
        <br /><span class="text-2md font-bold text-white"
            >Are you sure you want to delete <i>{{ subject.title }}</i> subject?</span
        >
        <br />
        <div class="flex justify-between">
            <button
                @click="deleteSubject"
                class="mt-10 bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded"
            >
                Delete
            </button>
            <Link
                href="/subjects"
                class="mt-10 bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded"
            >
                Cancel
            </Link>
        </div>
    </div>
</template>

<script setup>
import { Inertia } from "@inertiajs/inertia";
import { Link } from "@inertiajs/inertia-vue3";

const props = defineProps({
    subject: Object,
});

const deleteSubject = () => {
    Inertia.post(`/subjects/${props.subject.id}`, {
        _method: "delete",
    });
};
</script>
