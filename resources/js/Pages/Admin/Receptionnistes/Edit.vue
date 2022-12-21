<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';

const props = defineProps({
    receptionniste: Object,
});

const form = useForm({
    name: props.receptionniste.user.name,

    civilite: props.receptionniste.civilite,
    adress: props.receptionniste.adress,
    tel: props.receptionniste.tel,
});

const submit = () => {
    form.patch(route('receptionnistes.update',props.receptionniste.id), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};

</script>

<template>
    <main>
        <AuthenticatedLayout>
            <div class="flex align-center">
                <div>
                    <h2 class="font-bold text-lg sm:text-3xl text-gray-800 leading-tight">Modifier un receptionniste</h2>
                </div>
            </div>

            <div class="py-4 sm:py-6">
                <hr class="pb-4" />

                <nav aria-label="Breadcrumb" class="text-sm font-semibold mb-6">
                    <ol class="list-none p-0 inline-flex items-center ">
                        <li class="flex items-center">
                            <Link :href="route('admin')" alt="Dashboard" class="text-black">Tableau de bord</Link>
                        </li>
                        <li class="flex items-center">
                            <i class="fa-solid fa-angle-right mx-2 text-xs text-black"></i>
                        </li>
                        <li class="flex items-center">
                            <Link :href="route('receptionnistes.index')" alt="receptionnistes" class="text-black">
                            receptionnistes</Link>
                        </li>
                        <li class="flex items-center">
                            <i class="fa-solid fa-angle-right mx-2 text-xs text-black"></i>
                        </li>
                        <li class="flex items-center">
                            <Link alt="receptionnistes" class="text-gray-300 font-bold">
                            Modifier médecins</Link>
                        </li>
                    </ol>
                </nav>

                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                    <div class="p-4 sm:rounded-lg">
                        <form @submit.prevent="submit">

                            <div class="mb-6">
                                <label for="name" class="block mb-2 text-sm text-gray-900 font-bold ">Nom</label>
                                <input type="text" id="name"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-black focus:border-black block w-full p-2.5"
                                    placeholder="Nom du receptionniste" required v-model="form.name">
                                <InputError class="mt-2" :message="form.errors.name" />
                            </div>

                            <div class="mb-6">
                                <label for="civilite"
                                    class="block mb-2 text-sm text-gray-900 font-bold">Civilité</label>
                                <select id="civilite"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-black focus:border-black block w-full p-2.5"
                                    v-model="form.civilite">
                                    <option value="Mr.">Mr.</option>
                                    <option value="M.">M.</option>
                                    <option value="Melle.">Melle.</option>
                                </select>
                                <InputError class="mt-2" :message="form.errors.civilite" />
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-2 sm:gap-4">

                                <div class="mb-6">
                                    <label for="adress"
                                        class="block mb-2 text-sm text-gray-900 font-bold">Adress</label>
                                    <input type="text" id="adress"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-black focus:border-black block w-full p-2.5"
                                        placeholder="Adress du médecin" required v-model="form.adress">
                                    <InputError class="mt-2" :message="form.errors.adress" />
                                </div>

                                <div class="mb-6">
                                    <label for="tel" class="block mb-2 text-sm text-gray-900 font-bold">tel</label>
                                    <input type="text" id="tel"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-black focus:border-black block w-full p-2.5"
                                        placeholder="+33 ** ** ** ** **" required v-model="form.tel">
                                    <InputError class="mt-2" :message="form.errors.tel" />
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