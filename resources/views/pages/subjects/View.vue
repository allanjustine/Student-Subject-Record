<template layout="default">
    <h1 class="text-2xl font-bold text-black mb-5">
        Viewing Guest: {{ guests.name }} Details
    </h1>
    <div
        class="container bg-gray-100 border border-gray-600 w-[1000px] shadow p-10 mx-auto m-10"
    >
        <div v-if="guests" class="text-white mt-2">
            <table class="table mt-3 text-center">
                <thead>
                    <tr>
                        <th>ID.</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Check In Date</th>
                        <th>Check Out Date</th>
                        <th>Room Number</th>
                        <th>Room Capacity</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="text-black">
                        <td>{{ guests.id }}</td>
                        <td>{{ guests.name }}</td>
                        <td>{{ guests.email }}</td>
                        <td>{{ guests.phone }}</td>
                        <td>
                            {{
                                new Date(guests.check_in).toLocaleDateString(
                                    "en-US"
                                )
                            }}
                        </td>
                        <td>
                            {{
                                new Date(guests.check_out).toLocaleDateString(
                                    "en-US"
                                )
                            }}
                        </td>
                        <td>
                            {{ guests.room.room_number }}
                        </td>
                        <td>
                            {{ guests.room.capacity }}
                        </td>
                        <td>
                            &#8369;{{
                                guests.room.price.toLocaleString({
                                    minimumFractionDigits: 2,
                                })
                            }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <br />
        <Link
            class="bg-gray-500 hover:bg-gray-600 mt-1 text-center text-white font-bold py-2 mb-5 px-4 rounded"
            href="/guests"
        >
            Back
        </Link>
    </div>
</template>

<script setup>
import { Inertia } from "@inertiajs/inertia";
import { Link } from "@inertiajs/inertia-vue3";

const props = defineProps({
    guests: Array,
    rooms: Array,
});
</script>
