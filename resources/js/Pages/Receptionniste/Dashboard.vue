<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/inertia-vue3';
</script>

<template>
    <AuthenticatedLayout>
        <div class="flex align-center">
                <div>
                    <h2 class="font-bold text-3xl text-gray-800 leading-tight">Tableau de bord</h2>
                    <h4 class="text-gray-400">Vous êtes connecté en tant que Receptionniste </h4>
                </div>
                <div class="ml-auto align-center hidden sm:block">
                    <a class="py-2 px-3 border rounded mr-2"><i class="fa-solid fa-magnifying-glass"></i></a>
                    <a class=" w-full p-2 rounded bg-gray-900 text-white delay-200"><i class="fa-solid fa-plus text-sm"></i> Add new sale</a>
                </div>
            </div>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">You're logged in !</div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
