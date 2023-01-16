<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';

const props = defineProps({
    patient: Object,
});

</script>

<template>
    <main>
        <AuthenticatedLayout>
            <div class="flex align-center">
                <div>
                    <h2 class="font-bold text-lg sm:text-3xl text-gray-800 leading-tight">
                        <span class="mr-2 font-bold">{{ patient.civilite }}</span>{{ patient.nom + ' ' + patient.prenom
                        }}
                    </h2>
                </div>
            </div>

            <div class="py-4 sm:py-6">
                <hr class="pb-4" />

                <nav aria-label="Breadcrumb" class="text-sm font-semibold mb-6">
                    <ol class="list-none p-0 inline-flex items-center ">
                        <li class="flex items-center">
                            <Link :href="route('receptionniste')" alt="Dashboard" class="text-black">Tableau de bord
                            </Link>
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
                            <Link href="" alt="patients" class="text-gray-300 font-bold">
                            {{ patient.nom + ' ' + patient.prenom }}</Link>
                        </li>
                    </ol>
                </nav>

                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 mt-12">
                    <div class="flex flex-wrap items-center">
                        <div class="flex items-center w-full lg:w-1/2">
                            <div class="rounded-full w-40 h-40 img"></div>
                            <div class="ml-8">
                                <h2 class="font-bold text-2xl">Le patient</h2>
                                <p>
                                    <span class="mr-2 font-bold">{{ patient.civilite }}</span>{{ patient.nom + ' ' +
                                            patient.prenom
                                    }}
                                </p>
                                <div class="mt-4">
                                    <Link :href="route('rdvs.create')" alt="Add new rdv"
                                        class=" w-full py-2 px-3 bg-[#C2D3DB] hover:bg-[#643A6A] transition ease-in-out delay-150 text-white rounded-lg">
                                    <i class="fa-solid fa-plus text-sm sm:mr-2"></i>
                                    <span class="hidden sm:inline">Ajouter un rdv</span>
                                    </Link>
                                </div>
                            </div>
                        </div>
                        <div class="ml-auto flex flex-wrap items-center text-sm w-full lg:w-1/2">
                            <ul class="sm:border-r p-8 sm:w-1/2">
                                <li><span class="text-gray-400">Sexe:</span> {{ patient.civilite }} </li>
                                <li><span class="text-gray-400">Email:</span> {{ patient.email }} </li>
                                <li><span class="text-gray-400">Tel:</span> {{ patient.tel }} </li>
                                <li><span class="text-gray-400">Adress:</span> {{ patient.adress }} </li>
                            </ul>

                            <ul class="p-8 sm:w-1/2">
                                <li><span class="text-gray-400">Date de naissance:</span> {{ patient.date_naiss }} </li>
                                <li><span class="text-gray-400">Lieu de naissance:</span> {{ patient.lieu_naiss }} </li>
                                <li><span class="text-gray-400">Groupe sanguin:</span> {{ patient.groupe }} </li>
                                <li><span class="text-gray-400">Taille et poids:</span> {{ patient.taille }}m pour {{
                                        patient.poids
                                }}Kg </li>
                            </ul>

                        </div>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    </main>
</template>

<style scoped>
.img {
    background-image: url("../../../../img/user.jpg");
    background-size: cover;
}
</style>