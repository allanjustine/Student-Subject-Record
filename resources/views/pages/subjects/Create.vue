<template layout="default">
    <div
        class="container bg-gray-400 border border-gray-600 w-[600px] shadow p-10 mx-auto mt-5"
    >
        <h1 class="text-2xl font-bold mb-5 text-black text-center">
            Add Subject to Student
        </h1>
        <form @submit.prevent="add">
            <div class="grid grid-cols-1 sm:grid-cols-1 gap-4">
                <div class="flex flex-col mb-4">
                    <label class="font-bold text-black mb-2" for="student_id"
                        >Select Student:</label
                    >
                    <select
                        v-model="form.student_id"
                        title="student_id"
                        id="student_id"
                        class="border py-2 px-3 text-grey-darkest"
                    >
                        <option value="" hidden="true">Select Student</option>
                        <option disabled>Select Student</option>
                        <option
                            v-for="student in students"
                            :key="student.id"
                            :value="student.id"
                        >
                            Student: {{ student.name }}, ID Number:
                            {{ student.id_number }}
                        </option>
                    </select>
                    <span v-if="form.errors.student_id" class="text-red-600">{{
                        form.errors.student_id
                    }}</span>
                </div>
            </div>
            <div class="grid grid-cols-3 sm:grid-cols-3 gap-4">
                <div class="flex flex-col mb-4">
                    <label class="font-bold text-black mb-2" for="title"
                        >Title:</label
                    >
                    <input
                        type="text"
                        id="title"
                        v-model="form.title"
                        class="border py-2 px-3 text-grey-darkest"
                    />
                    <span v-if="form.errors.title" class="text-red-600">{{
                        form.errors.title
                    }}</span>
                </div>
                <div class="flex flex-col mb-4">
                    <label class="font-bold text-black mb-2" for="units"
                        >Units:</label
                    >
                    <input
                        v-model="form.units"
                        type="number"
                        title="units"
                        id="units"
                        class="border py-2 px-3 text-grey-darkest"
                    />
                    <span v-if="form.errors.units" class="text-red-600">{{
                        form.errors.units
                    }}</span>
                </div>

                <div class="flex flex-col mb-4">
                    <label class="font-bold text-black mb-2" for="pay_units"
                        >Pay Units:</label
                    >
                    <input
                        v-model="form.pay_units"
                        type="number"
                        title="pay_units"
                        id="pay_units"
                        class="border py-2 px-3 text-grey-darkest"
                    />
                    <span v-if="form.errors.pay_units" class="text-red-600">{{
                        form.errors.pay_units
                    }}</span>
                </div>
            </div>

            <div class="flex justify-between">
                <button
                    type="submit"
                    class="bg-sky-500 hover:bg-sky-800 text-white font-bold block py-2 px-4 rounded"
                >
                    Save
                </button>

                <Link
                    href="/subjects"
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
import { Link } from "@inertiajs/inertia-vue3";

const props = defineProps({
    students: Object,
});

let form = useForm({
    title: "",
    units: "",
    pay_units: "",
    student_id: "",
});

const add = () => {
    form.post("/subjects");
};
</script>
