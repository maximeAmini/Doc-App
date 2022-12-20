<script>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import { Inertia } from "@inertiajs/inertia";
export default {
    components: {
        AuthenticatedLayout,
        Head,
        Link,
    },
    props: ["patients"],
    data() {
        return {
            patients2: "",
            type: "ASC",
            search: false,
            searchInput: '',
            checkedAll: false,
            checkGroupe: []
        };
    },
    methods: {
        deletepatient(id) {
            Inertia.delete(route("patients.destroy", id));
            this.patients2 = this.patients2.filter((obj) => obj.id !== id);
        },
        checkAll() {
            if (this.checkedAll == false) {
                var table = []
                this.patients2.forEach(function (arrayItem) {
                    table.push(arrayItem.id)
                });
                this.checkGroupe = table
                this.checkedAll = true
            } else {
                this.checkGroupe = []

                this.checkedAll = false
            }
        },
        deleteAll() {
            for (var i = 0; i < this.checkGroupe.length; i++) {
                this.deletepatient(this.checkGroupe[i]);
            }
        },
        orgnise(type) {
            axios.get(route("patients.orgnise", type)).then((res) => {
                this.patients2 = res.data;
                if (this.type == "DESC") {
                    this.type = "ASC";
                } else {
                    this.type = "DESC";
                }
            });
        },
        searchFunc() {
            axios.get(route("patients.search", this.searchInput)).then((res) => {
                if (res.data != '') {
                    this.patients2 = res.data;
                } else {
                    this.patients2 = this.patients
                }
                console.log(this.patients2)
            });
        },
    },
    mounted() {
        this.patients2 = this.patients;
    },
};
</script>

<template>
    <main>
        <AuthenticatedLayout>
            <!-- hearder -->
            <div class="flex align-center">
                <div>
                    <h2 class="font-bold text-lg sm:text-3xl text-gray-800 leading-tight">
                        Patients
                    </h2>
                </div>
                <div class="ml-auto align-center">
                    <a class="py-2 px-3 border rounded-full mr-2 cursor-pointer" alt="search button"><i
                            class="fa-solid fa-magnifying-glass" @click="search = !search"></i></a>
                    <Link :href="route('patients.create')" alt="Add new patient"
                        class="w-full py-2 px-3 bg-[#C2D3DB] hover:bg-[#643A6A] transition ease-in-out delay-150 text-white rounded-full">
                    <i class="fa-solid fa-plus text-sm sm:mr-2"></i>
                    <span class="hidden sm:inline">Ajouter un patient</span>
                    </Link>
                </div>
            </div>

            <!-- input search -->
            <div class="text-gray-600 w-full mt-6" v-if="search">
                <span type="submit" class="absolute right-0 top-0 mt-2 mr-4">
                    <i class="fa-solid fa-magnifying-glass fill-current"></i>
                </span>
                <input type="text" name="serch" placeholder="Search patient..."
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-full focus:ring-black focus:border-black block w-full p-2.5"
                    v-model="searchInput" @input="searchFunc" />
            </div>

            <div class="py-4 sm:py-6">
                
                <!-- mini nav -->
                <hr class="pb-4" />
                <nav aria-label="Breadcrumb" class="text-sm font-semibold mb-8">
                    <ol class="list-none p-0 inline-flex items-center ">
                        <li class="flex items-center">
                            <Link :href="route('receptionniste')" alt="Dashboard" class="text-black">Dashboard</Link>
                        </li>
                        <li class="flex items-center">
                            <i class="fa-solid fa-angle-right mx-2 text-xs text-black"></i>
                        </li>
                        <li class="flex items-center">
                            <Link :href="route('patients.index')" alt="patients" class="text-gray-300 font-bold">
                            Patients</Link>
                        </li>
                    </ol>
                </nav>

                <!-- order button -->
                <div class="pb-8">
                    <button @click="orgnise(type)" class="py-2 px-3 border border-gray-700 mr-2 rounded-full">
                        <i class="fa-solid" :class="
                            type == 'DESC'
                                ? 'fa-arrow-down-wide-short'
                                : 'fa-arrow-up-wide-short'
                        "></i>
                        Des plus
                        <span v-if="type == 'DESC'">recentes</span>
                        <span v-else>anciennes</span>
                    </button>
                </div>

                <!-- table -->
                <div class="overflow-x-auto shadow-md rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr>
                                <th scope="col" class="p-4">
                                    <div class="flex items-center">
                                        <input id="checkbox-all" type="checkbox"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500"
                                            :value="checkedAll" @click="checkAll" />
                                        <label for="checkbox-all" class="sr-only">checkbox</label>
                                    </div>
                                </th>
                                <th scope="col" class="px-6 py-3">Nom</th>
                                <th scope="col" class="px-6 py-3">Email</th>
                                <th scope="col" class="px-6 py-3">Adress</th>
                                <th scope="col" class="px-6 py-3">Tel</th>
                                <th scope="col" class="px-6 py-3">Nombre de randez-vous</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="bg-white border-b hover:bg-gray-50"
                                v-for="patient in patients2" :key="patient.id">
                                <td class="w-4 p-4">
                                    <div class="flex items-center">
                                        <input id="checkbox-table-1" type="checkbox"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500"
                                            :value="patient.id" v-model="checkGroupe" />
                                    </div>
                                </td>
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    <span class="mr-2 font-bold">{{patient.civilite}}</span>{{ patient.nom+' '+patient.prenom }}
                                    <div class="mt-2">
                                        <i @click="deletepatient(patient.id)"
                                            class="fa-regular fa-trash-can mr-4 text-red-600 fa-lg cursor-pointer"></i>
                                        <Link :href="
                                            route(
                                                'patients.edit',
                                                patient.id
                                            )
                                        "><i
                                            class="fa-regular fa-pen-to-square text-green-600 fa-lg cursor-pointer"></i>
                                        </Link>
                                    </div>
                                </th>
                                <td class="px-6 py-4">
                                    {{ patient.email }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ patient.adress }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ patient.tel }}
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-green-400">
                                       0 rdv
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- delete all button -->
                <button type="button" alt="Delete All Selection"
                    class="block mt-8 focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 mr-2 mb-2 ml-auto"
                    @click="deleteAll">
                    <i class="fa-regular fa-trash-can mr-1"></i> Delete All Selection
                </button>
            </div>
        </AuthenticatedLayout>
    </main>
</template>
