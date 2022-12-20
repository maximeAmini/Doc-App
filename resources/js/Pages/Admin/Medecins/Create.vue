<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',

    civilite: 'Mr.',
    specialite: '',
    adress: '',
    tel: '',
});

const submit = () => {
    form.post(route('medecins.store'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};

</script>

<template>
    <main>
        <AuthenticatedLayout>
            <div class="flex align-center">
                <div>
                    <h2 class="font-bold text-lg sm:text-3xl text-gray-800 leading-tight">Ajouter un medecin</h2>
                </div>
            </div>

            <div class="py-4 sm:py-6">
                <hr class="pb-4" />

                <nav aria-label="Breadcrumb" class="text-sm font-semibold mb-6">
                    <ol class="list-none p-0 inline-flex items-center ">
                        <li class="flex items-center">
                            <Link :href="route('dashboard')" alt="Dashboard" class="text-black">Dashboard</Link>
                        </li>
                        <li class="flex items-center">
                            <i class="fa-solid fa-angle-right mx-2 text-xs text-black"></i>
                        </li>
                        <li class="flex items-center">
                            <Link :href="route('medecins.index')" alt="medecins" class="text-black">
                            Medecins</Link>
                        </li>
                        <li class="flex items-center">
                            <i class="fa-solid fa-angle-right mx-2 text-xs text-black"></i>
                        </li>
                        <li class="flex items-center">
                            <Link :href="route('medecins.create')" alt="medecins" class="text-gray-300 font-bold">
                            Ajouter médecins</Link>
                        </li>
                    </ol>
                </nav>

                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                    <div class="p-4 sm:rounded-lg">
                        <form @submit.prevent="submit">
                            <div class="mb-6 grid grid-cols-3 items-center justify-center">
                                <hr>
                                <h3 class="font-bold text-center text-lg">Information de connexion</h3>
                                <hr>
                            </div>

                            <div class="mb-6">
                                <label for="name" class="block mb-2 text-sm text-gray-900 font-bold ">Nom</label>
                                <input type="text" id="name"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-black focus:border-black block w-full p-2.5"
                                    placeholder="Nom du medecin" required v-model="form.name">
                                <InputError class="mt-2" :message="form.errors.name" />
                            </div>

                            <div class="mb-6">
                                <label for="email" class="block mb-2 text-sm text-gray-900 font-bold">Email</label>
                                <input type="mail" id="email"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-black focus:border-black block w-full p-2.5"
                                    placeholder="exemple@gmail.com" required v-model="form.email">
                                <InputError class="mt-2" :message="form.errors.email" />
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-2 sm:gap-4">

                                <div class="mb-6">
                                    <label for="password" class="block mb-2 text-sm text-gray-900 font-bold">Mot de
                                        passe</label>
                                    <input type="password" id="password"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-black focus:border-black block w-full p-2.5"
                                        placeholder="Mot de passe" required v-model="form.password">
                                    <InputError class="mt-2" :message="form.errors.password" />
                                </div>

                                <div class="mb-6">
                                    <label for="password_confirmation"
                                        class="block mb-2 text-sm text-gray-900 font-bold">Confirmez le mot de
                                        passe</label>
                                    <input type="password" id="password_confirmation"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-black focus:border-black block w-full p-2.5"
                                        placeholder="Confirmez le mot de passe" required v-model="form.password_confirmation">
                                    <InputError class="mt-2" :message="form.errors.password_confirmation" />
                                </div>
                            </div>

                            <div class="mb-6 grid grid-cols-3 items-center justify-center">
                                <hr>
                                <h3 class="font-bold text-center text-lg">Information sur le medecin</h3>
                                <hr>
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

                            <div class="mb-6">
                                <label for="specialite"
                                    class="block mb-2 text-sm text-gray-900 font-bold">Specialite</label>
                                <input type="text" id="specialite"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-black focus:border-black block w-full p-2.5"
                                    placeholder="Specialite" required v-model="form.specialite">
                                <InputError class="mt-2" :message="form.errors.specialite" />
                            </div>

                            <div class="w-full flex justify-end items-end mt-6">
                                <button type="submit"
                                    class="ml-auto text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Submit</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    </main>
</template>