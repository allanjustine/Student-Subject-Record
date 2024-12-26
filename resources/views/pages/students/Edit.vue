<template layout="default">
    <div
        class="container bg-gray-400 border border-gray-600 w-[800px] shadow p-10 mx-auto mt-5"
    >
        <h1 class="text-2xl font-bold mb-5 text-black text-center">
            Update Students
        </h1>
        <form @submit.prevent="updateStudents">
            <div class="grid grid-cols-2 sm:grid-cols-2 gap-4">
                <div class="flex flex-col mb-4">
                    <label class="font-bold text-black mb-2" for="id_number"
                        >ID Number:</label
                    >
                    <input
                        type="text"
                        id="id_number"
                        v-model="form.id_number"
                        class="border py-2 px-3 text-grey-darkest"
                    />
                    <span v-if="form.errors.id_number" class="text-red-600">{{
                        form.errors.id_number
                    }}</span>
                </div>

                <div class="flex flex-col mb-4">
                    <label class="font-bold text-black mb-2" for="name"
                        >Name:</label
                    >
                    <input
                        v-model="form.name"
                        type="text"
                        name="name"
                        id="name"
                        class="border py-2 px-3 text-grey-darkest"
                    />
                    <span v-if="form.errors.name" class="text-red-600">{{
                        form.errors.name
                    }}</span>
                </div>

                <div class="flex flex-col mb-4">
                    <label class="font-bold text-black mb-2" for="address"
                        >Address:</label
                    >
                    <input
                        v-model="form.address"
                        type="text"
                        id="address"
                        name="address"
                        class="border py-2 px-3 text-grey-darkest"
                    />
                    <span v-if="form.errors.address" class="text-red-600">{{
                        form.errors.address
                    }}</span>
                </div>
                <div class="flex flex-col mb-4">
                    <label class="font-bold text-black mb-2" for="phone"
                        >Phone:</label
                    >
                    <input
                        v-model="form.phone"
                        type="text"
                        id="phone"
                        name="phone"
                        class="border py-2 px-3 text-grey-darkest"
                    />
                    <span v-if="form.errors.phone" class="text-red-600">{{
                        form.errors.phone
                    }}</span>
                </div>
            </div>

            <div class="flex flex-col mb-4">
                <label class="font-bold text-black mb-2" for="date_of_birth"
                    >Date Of Birth:</label
                >
                <input
                    v-model="form.date_of_birth"
                    type="date"
                    id="date_of_birth"
                    name="date_of_birth"
                    class="border py-2 px-3 text-grey-darkest"
                />
                <span v-if="form.errors.date_of_birth" class="text-red-600">{{
                    form.errors.date_of_birth
                }}</span>
            </div>

            <div class="flex items-center justify-between">
                <button
                    type="submit"
                    class="bg-sky-500 hover:bg-sky-600 text-white font-bold py-2 px-4 rounded"
                >
                    Save
                </button>
                <Link
                    href="/students"
                    class="bg-gray-500 hover:bg-gray-600 mt-1 text-center text-white font-bold py-2 px-4 rounded"
                >
                    Back
                </Link>
            </div>
        </form>
    </div>
</template>

<script setup>
import { useForm } from "@inertiajs/inertia-vue3";
import { Inertia } from "@inertiajs/inertia";
import { Link } from "@inertiajs/inertia-vue3";

const props = defineProps({
    student: Object,
});

let form = useForm({
    id_number: props.student.id_number,
    name: props.student.name,
    address: props.student.address,
    phone: props.student.phone,
    date_of_birth: props.student.date_of_birth,
});

const updateStudents = () => {
    Inertia.post(`/students/${props.student.id}`, {
        _method: "put",
        id_number: form.id_number,
        name: form.name,
        address: form.address,
        phone: form.phone,
        date_of_birth: form.date_of_birth,
    });
};
</script>
