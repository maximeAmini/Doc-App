<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';

const props = defineProps({
    patient: Object,
});

const form = useForm({
    nom: props.patient.nom,
    prenom: props.patient.prenom,
    email: props.patient.email,
    adress: props.patient.adress,
    civilite: props.patient.civilite,
    tel: props.patient.tel,
    date_naiss: props.patient.date_naiss,
    lieu_naiss: props.patient.lieu_naiss,
    groupe_sang: props.patient.groupe_sang,
    taille: props.patient.taille,
    poids: props.patient.poids,
});

</script>

<template>
    <main>
        <AuthenticatedLayout>
            <div class="flex align-center">
                <div>
                    <h2 class="font-bold text-lg sm:text-3xl text-gray-800 leading-tight">Ajouter un patient</h2>
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
                            <Link :href="route('patients.index')" alt="patients" class="text-black">
                            Patients</Link>
                        </li>
                        <li class="flex items-center">
                            <i class="fa-solid fa-angle-right mx-2 text-xs text-black"></i>
                        </li>
                        <li class="flex items-center">
                            <Link :href="route('patients.create')" alt="patients" class="text-gray-300 font-bold">
                            Ajouter patients</Link>
                        </li>
                    </ol>
                </nav>

                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                    <div class="p-4 sm:rounded-lg">
                        <form @submit.prevent="form.patch(route('patients.update',patient.id))">
                            <div class="mb-6 grid grid-cols-3 items-center justify-center">
                                <hr>
                                <h3 class="font-bold text-center text-lg">Informations personnels</h3>
                                <hr>
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-2 sm:gap-4">
                                <div class="mb-6">
                                    <label for="nom" class="block mb-2 text-sm text-gray-900 font-bold ">Nom</label>
                                    <input type="text" id="nom"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-black focus:border-black block w-full p-2.5"
                                        placeholder="Nom du patient" required v-model="form.nom">
                                    <InputError class="mt-2" :message="form.errors.nom" />
                                </div>
                                <div class="mb-6">
                                    <label for="prenom"
                                        class="block mb-2 text-sm text-gray-900 font-bold ">Prénom</label>
                                    <input type="text" id="prenom"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-black focus:border-black block w-full p-2.5"
                                        placeholder="Prénom du patient" required v-model="form.prenom">
                                    <InputError class="mt-2" :message="form.errors.prenom" />
                                </div>
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-2 sm:gap-4">
                                <div class="mb-6">
                                    <label for="email" class="block mb-2 text-sm text-gray-900 font-bold">Email</label>
                                    <input type="mail" id="email"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-black focus:border-black block w-full p-2.5"
                                        placeholder="exemple@gmail.com" required v-model="form.email">
                                    <InputError class="mt-2" :message="form.errors.email" />
                                </div>
                                <div class="mb-6">
                                    <label for="tel" class="block mb-2 text-sm text-gray-900 font-bold ">Tel</label>
                                    <input type="text" id="tel"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-black focus:border-black block w-full p-2.5"
                                        placeholder="Tel du patient" required v-model="form.tel">
                                    <InputError class="mt-2" :message="form.errors.tel" />
                                </div>
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-2 sm:gap-4">
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

                                <div class="mb-6">
                                    <label for="adress"
                                        class="block mb-2 text-sm text-gray-900 font-bold ">adress</label>
                                    <input type="text" id="adress"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-black focus:border-black block w-full p-2.5"
                                        placeholder="Adress du patient" required v-model="form.adress">
                                    <InputError class="mt-2" :message="form.errors.adress" />
                                </div>
                            </div>



                            <div class="mb-6 grid grid-cols-3 items-center justify-center">
                                <hr>
                                <h3 class="font-bold text-center text-lg">Informations médical</h3>
                                <hr>
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-2 sm:gap-4">

                                <div class="mb-6">
                                    <label for="date_naiss" class="block mb-2 text-sm text-gray-900 font-bold">Date de
                                        naissance</label>
                                    <input type="date" id="date_naiss"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-black focus:border-black block w-full p-2.5"
                                        placeholder="date_naiss du médecin" required v-model="form.date_naiss">
                                    <InputError class="mt-2" :message="form.errors.date_naiss" />
                                </div>

                                <div class="mb-6">
                                    <label for="lieu_naiss" class="block mb-2 text-sm text-gray-900 font-bold">Lieu
                                        naissance</label>
                                    <input type="text" id="lieu_naiss"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-black focus:border-black block w-full p-2.5"
                                        placeholder="Lieu de naissance" required v-model="form.lieu_naiss">
                                    <InputError class="mt-2" :message="form.errors.lieu_naiss" />
                                </div>
                            </div>

                            <div class="mb-6">
                                <label for="groupe_sang" class="block mb-2 text-sm text-gray-900 font-bold">Groupe
                                    sangin</label>
                                <select id="groupe_sang"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-black focus:border-black block w-full p-2.5"
                                    v-model="form.groupe_sang">
                                    <option value="AB+">AB+</option>
                                    <option value="AB-">AB-</option>
                                    <option value="A+">A+</option>
                                    <option value="A-">A-</option>
                                    <option value="B+">B+</option>
                                    <option value="B-">B-</option>
                                    <option value="O+">O+</option>
                                    <option value="O-">O-</option>
                                </select>
                                <InputError class="mt-2" :message="form.errors.groupe_sang" />
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-2 sm:gap-4">

                                <div class="mb-6">
                                    <label for="taille"
                                        class="block mb-2 text-sm text-gray-900 font-bold">Taille</label>
                                    <input type="number" id="taille"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-black focus:border-black block w-full p-2.5"
                                        placeholder="00.00" required v-model="form.taille">
                                    <InputError class="mt-2" :message="form.errors.taille" />
                                </div>

                                <div class="mb-6">
                                    <label for="poids" class="block mb-2 text-sm text-gray-900 font-bold">Poids</label>
                                    <input type="number" id="poids"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-black focus:border-black block w-full p-2.5"
                                        placeholder="00.00" required v-model="form.poids">
                                    <InputError class="mt-2" :message="form.errors.poids" />
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