<template layout>
    <div class="bg-gray-300 w-[1250px] p-5 rounded mt-5">
        <div>
            <h1 class="mb-3">Student List</h1>
        </div>
        <Link
            href="/students/create"
            class="btn bg-gray-900 float-right text-center hover:bg-gray-600 mt-5 mb-4"
            >Add Student</Link
        >
        <div class="py-4">
            <table class="table mt-5 text-center">
                <thead>
                    <tr>
                        <th>ID.</th>
                        <th>ID Number</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Date Of Birth</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr
                        v-for="student in students.data"
                        :key="student.id"
                        class="text-black"
                    >
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
                        <td>
                            <Link
                                :href="'/students/view/' + student.id"
                                class="btn mr-1 bg-green-600 hover:bg-green-700"
                            >
                                View
                            </Link>
                            <Link
                                :href="'/students/edit/' + student.id"
                                class="btn bg-sky-600 hover:bg-sky-700"
                            >
                                Edit
                            </Link>
                            <Link
                                :href="'/students/delete/' + student.id"
                                class="ml-1 btn bg-red-700 hover:bg-red-800"
                            >
                                Delete
                            </Link>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="flex justify-between">
            <div class="text-black">
                Showing <strong>{{ students.data.length }}</strong> entries.
            </div>
            <nav
                class="isolate inline-flex -space-x-px rounded-md shadow-sm"
                aria-label="Pagination"
            >
                <ul class="pagination">
                    <li
                        v-for="page in students.links"
                        :key="page.url"
                        :class="{
                            ' relative z-10 inline-flex items-center text-white ring-1 ring-inset bg-gray-800 ring-gray-900 hover:bg-gray-700 focus:outline-offset-0':
                                !page.active && page.label !== 'Previous',
                            ' relative z-10 inline-flex items-center text-sm font-semibold text-white focus:z-20 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-900':
                                page.active,
                            'opacity-50 cursor-not-allowed relative z-10 inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-300 ring-1 ring-inset ring-gray-900':
                                !page.url && page.label === 'Previous',
                        }"
                    >
                        <Link
                            v-if="page.url"
                            :href="page.url"
                            :class="{
                                'cursor-pointer relative z-10 inline-flex items-center px-4 py-2 text-sm font-semibold text-white ring-1 ring-inset ring-gray-300 hover:bg-gray-500 focus:outline-offset-0':
                                    !page.active && page.label !== 'Previous',
                                'cursor-pointer relative z-10 inline-flex items-center bg-gray-900 px-4 py-2 text-sm font-semibold text-white focus:z-20 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-600':
                                    page.active,
                                'opacity-50 cursor-not-allowed relative z-10 inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-300 ring-1 ring-inset ring-gray-300':
                                    !page.url && page.label === 'Previous',
                            }"
                        >
                            <span v-if="page.label.includes('Next')"
                                >Next <i class="fas fa-chevron-right"></i
                            ></span>

                            <span v-else-if="page.label.includes('Previous')">
                                <i class="fas fa-chevron-left"></i> Previous
                            </span>
                            <span v-else class="page-link">{{
                                page.label
                            }}</span>
                        </Link>
                        <span
                            v-else-if="page.label.includes('Previous')"
                            class="cursor-not-allowed px-4 py-2"
                            ><i class="fas fa-chevron-left"></i> Previous</span
                        >
                        <span v-else class="cursor-not-allowed px-4 py-2"
                            >Next <i class="fas fa-chevron-right"></i
                        ></span>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</template>

<script setup>
import { Link } from "@inertiajs/inertia-vue3";
defineProps({
    students: Array,
});
</script>
