<template layout="default">
    <div
        class="container bg-gray-300 border border-gray-600 w-[1000px] shadow p-10 mx-auto m-10"
    >
        <h1 class="text-2xl font-bold text-black mb-5">
            Student: [{{ student.id_number }}-{{ student.name }}]
        </h1>
        <hr />
        <div v-if="student" class="text-white mt-2">
            <table class="table mt-3 text-center">
                <thead>
                    <tr>
                        <th>ID.</th>
                        <th>ID Number</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Date of Birth</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="text-black">
                        <td>{{ student.id }}</td>
                        <td>{{ student.id_number }}</td>
                        <td>{{ student.name }}</td>
                        <td>{{ student.address }}</td>
                        <td>{{ student.phone }}</td>
                        <td>
                            {{
                                new Date(
                                    student.date_of_birth
                                ).toLocaleDateString("en-US")
                            }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <h1 class="mt-3 mb-5 text-2xl font-bold text-black">Subjects Taken</h1>
        <hr />
        <div class="text-white mt-2">
            <table class="table mt-3 text-center">
                <thead>
                    <tr>
                        <th>ID.</th>
                        <th>Subject Title</th>
                        <th>Units</th>
                        <th>Pay Units</th>
                    </tr>
                </thead>
                <tbody>
                    <tr
                        v-for="subject in student.subjects"
                        :key="subject.id"
                        class="text-black"
                    >
                        <td>{{ subject.id }}</td>
                        <td>{{ subject.title }}</td>
                        <td>{{ subject.units }}</td>
                        <td>{{ subject.pay_units }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <br />
        <Link
            class="bg-gray-500 hover:bg-gray-600 mt-1 text-center text-white font-bold py-2 mb-5 px-4 rounded"
            href="/students"
        >
            Back
        </Link>
    </div>
</template>

<script setup>
import { Inertia } from "@inertiajs/inertia";
import { Link } from "@inertiajs/inertia-vue3";

const props = defineProps({
    student: Array,
    subjects: Array,
});
</script>
