<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';

const props = defineProps({
    rdv: Object,
});

const form = useForm({
    date: props.rdv.date,
    heure: props.rdv.heure,
});

</script>

<template>
    <main>
        <AuthenticatedLayout>
            <div class="flex align-center">
                <div>
                    <h2 class="font-bold text-lg sm:text-3xl text-gray-800 leading-tight">Modifier le rdv</h2>
                </div>
            </div>

            <div class="py-4 sm:py-6">
                <hr class="pb-4" />

                <nav aria-label="Breadcrumb" class="text-sm font-semibold mb-6">
                    <ol class="list-none p-0 inline-flex items-center ">
                        <li class="flex items-center">
                            <Link :href="route('receptionniste')" alt="Dashboard" class="text-black">Tableau de bord</Link>
                        </li>
                        <li class="flex items-center">
                            <i class="fa-solid fa-angle-right mx-2 text-xs text-black"></i>
                        </li>
                        <li class="flex items-center">
                            <Link :href="route('rdvs.index')" alt="rdvs" class="text-black">
                            Rdvs</Link>
                        </li>
                        <li class="flex items-center">
                            <i class="fa-solid fa-angle-right mx-2 text-xs text-black"></i>
                        </li>
                        <li class="flex items-center">
                            <Link :href="route('rdvs.create')" alt="rdvs" class="text-gray-300 font-bold">
                                Modifier Rdv</Link>
                        </li>
                    </ol>
                </nav>

                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                    <div class="p-4 sm:rounded-lg">
                        <form @submit.prevent="form.patch(route('rdv.update',patient.id))">

                            <div class="grid grid-cols-1 sm:grid-cols-2 sm:gap-4">
                                <div class="mb-6">
                                    <label for="date" class="block mb-2 text-sm text-gray-900 font-bold ">Date</label>
                                    <input type="date" id="date"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-black focus:border-black block w-full p-2.5"
                                        placeholder="Date du rdv" required v-model="form.date">
                                    <InputError class="mt-2" :message="form.errors.date" />
                                </div>
                                <div class="mb-6">
                                    <label for="heure"
                                        class="block mb-2 text-sm text-gray-900 font-bold ">Heure</label>
                                    <input type="time" id="heure"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-black focus:border-black block w-full p-2.5"
                                        placeholder="Heure du rdv" required v-model="form.heure">
                                    <InputError class="mt-2" :message="form.errors.heure" />
                                </div>
                            </div>

                            <div class="w-full flex justify-end items-end mt-6">
                                <button type="submit"
                                    class="ml-auto text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Modifier</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    </main>
</template>