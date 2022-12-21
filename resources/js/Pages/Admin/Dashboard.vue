
<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/inertia-vue3';
import Pie from '@/Components/charts/Pie.vue'
export default {
    components: {
        AuthenticatedLayout,
        Head,
        Pie,
    },
    data() {
        return {
            medecins: 0,
            receptionnistes:0
        };
    },
    methods: {
        getNbMedecin() {
            axios.get(route("medecins.nb")).then((res) => {
                this.medecins = res.data
            });
        },
        getNbReceptionniste() {
            axios.get(route("receptionnistes.nb")).then((res) => {
                this.receptionnistes = res.data
            });
        },
    },
    mounted() {
        this.getNbMedecin();
        this.getNbReceptionniste();
    },
};
</script>

<template>
    <AuthenticatedLayout>
        <div class="flex align-center">
            <div>
                <h2 class="font-bold text-3xl text-gray-800 leading-tight">Tableau de bord</h2>
                <h4 class="text-gray-400">Vous êtes connecté en tant qu'administrateur </h4>
            </div>
        </div>

        <div class="py-12 grid grid-cols-1 sm:grid-cols-3 sm:gap-4">
            <div
                class="border border-b-[#FF7C50] border-b-4 shadow-gray-200 rounded-lg p-4 flex items-center hover:scale-105 transition delay-150 duration-300 ease-in-out mb-2 cursor-pointer">
                <div class="flex items-center justify-center mr-2 rounded-full bg-[#FF7C50] text-white w-10 h-10">
                    <i class="fa-solid fa-hospital-user"></i>
                </div>

                <div class="text-gray-400">
                    Medecins
                    <p class="font-bold text-lg text-gray-800">{{ medecins }}</p>
                </div>

                <div class="w-14 h-14 flex justify-center items-center font-bold text-green-500 ml-auto">
                    +4
                    <i class="ml-1 fa-solid fa-up-long"></i>
                </div>
            </div>
            <div
                class="border border-b-[#C2D3DB] border-b-4 shadow-gray-200 rounded-lg p-4 flex items-center hover:scale-105 transition delay-150 duration-300 ease-in-out mb-2 cursor-pointer">
                <div class="flex items-center justify-center mr-2 rounded-full bg-[#C2D3DB] text-white w-10 h-10">
                    <i class="fa-solid fa-user-tie"></i>
                </div>

                <div class="text-gray-400">
                    Receptionnistes
                    <p class="font-bold text-lg text-gray-800">{{ receptionnistes }}</p>
                </div>

                <div class="w-14 h-14 flex justify-center items-center font-bold text-yellow-300 ml-auto">
                    1
                    <i class="ml-1 fa-solid fa-arrow-right-arrow-left"></i>
                </div>
            </div>
        </div>
        <div class="flex flex-wrap">
            <div class="sm:w-1/2 text-2xl w-full text-center">
                <p class="text-xl font-semibold mb-4">Statistiques de cette années</p>
                <Pie />
            </div>
        </div>

    </AuthenticatedLayout>
</template>
