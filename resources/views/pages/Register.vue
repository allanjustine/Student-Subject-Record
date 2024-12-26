<template layout="default">
    <div class="flex justify-center items-center h-screen bg-gray-100">
        <div
            class="w-[300px] bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4"
            style="margin-top: 130px"
        >
            <div class="logo mx-auto mb-4 h-40 w-40">
                <img src="/images/logo.png" alt="Logo" />
            </div>
            <div>
                <h1 class="text-center">Register</h1>
                <br />
                <form @submit.prevent="submit">
                    <div class="mb-4 flex flex-col">
                        <label
                            for="username"
                            class="block text-gray-700 text-sm font-bold mb-2"
                            >User Name:</label
                        >
                        <input
                            v-model="form.username"
                            type="text"
                            placeholder="Username"
                            class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-blue-500"
                        />
                        <div
                            class="text-sm text-red-500 italic"
                            v-if="form.errors.username"
                        >
                            {{ form.errors.username }}
                        </div>
                    </div>
                    <div class="mb-4 flex flex-col">
                        <label
                            for="fullname"
                            class="block text-gray-700 text-sm font-bold mb-2"
                            >Full Name:</label
                        >
                        <input
                            v-model="form.fullname"
                            type="text"
                            placeholder="Full Name"
                            class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-blue-500"
                        />
                        <div
                            class="text-sm text-red-500 italic"
                            v-if="form.errors.fullname"
                        >
                            {{ form.errors.fullname }}
                        </div>
                    </div>
                    <div class="mb-4 flex flex-col">
                        <label
                            for="password"
                            class="block text-gray-700 text-sm font-bold mb-2"
                            >Password:</label
                        >
                        <input
                            v-model="form.password"
                            type="password"
                            placeholder="Password"
                            class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-blue-500"
                        />
                        <div
                            class="text-sm text-red-500 italic"
                            v-if="form.errors.password"
                        >
                            {{ form.errors.password }}
                        </div>
                    </div>
                    <div class="mb-4 flex flex-col">
                        <label
                            for="mobile_number"
                            class="block text-gray-700 text-sm font-bold mb-2"
                            >Mobile Number:</label
                        >
                        <input
                            v-model="form.mobile_number"
                            type="text"
                            placeholder="Mobile Number"
                            class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-blue-500"
                        />
                        <div
                            class="text-sm text-red-500 italic"
                            v-if="form.errors.mobile_number"
                        >
                            {{ form.errors.mobile_number }}
                        </div>
                    </div>
                    <div class="mb-4 flex flex-col">
                        <label
                            for="role"
                            class="block text-gray-700 text-sm font-bold mb-2"
                            >Role:</label
                        >
                        <select
                            name="role"
                            id="role"
                            v-model="form.role"
                            class="border py-2 px-3"
                        >
                            <option value="">Select an option</option>
                            <option value="Principal">Principal</option>
                            <option value="Teacher">Teacher</option>
                        </select>
                        <div
                            class="text-sm text-red-500 italic"
                            v-if="form.errors.role"
                        >
                            {{ form.errors.role }}
                        </div>
                    </div>
                    <div>
                        <button
                            class="bg-blue-500 w-full hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                            type="submit"
                        >
                            Register
                        </button>
                        <p class="mt-2">
                            Already have an account?
                            <Link href="/login" class="text-blue-500"
                                >Sign In</Link
                            >
                        </p>
                    </div>
                    <div
                        class="text-sm text-red-500 italic"
                        v-if="form.errors.authentication"
                    >
                        {{ form.errors.authentication }}
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script setup>
import { useForm } from "@inertiajs/inertia-vue3";
import { Link } from "@inertiajs/inertia-vue3";

let form = useForm({
    username: "",
    password: "",
    fullname: "",
    role: "",
    mobile_number: "",
});

const submit = () => {
    form.post("/register");
};
</script>
