<template>
    <div class="mb-6 relative z-20">
        <label for="patient" class="block mb-2 text-sm text-gray-900 font-bold">Patient</label>
        <input type="text" id="patient"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-black focus:border-black block w-full p-2.5"
            placeholder="Nom du patient" v-model="searchInput" @input="searchFunc" required>

        <ul class="absolute w-full bg-white border-x border border-gray-300  mt-1 mh-48 overflow-hidden overflow-y-scroll rounded-lg" v-if="patients.length > 0">
            <li class="py-2.5 sm:py-2.5 border-b cursor-pointer" v-for="patient in patients"
            :key="patient.id" @click="add(patient)">
                <div class="flex items-center space-x-4">
                    <div class="px-6 inline-flex items-center text-base font-semibold text-gray-900" >
                        {{ patient.nom }}
                    </div>
                </div>
            </li>
            <hr />
        </ul>
    </div>
</template>

<script>
import { provide } from 'vue';

export default {
    props:['patient'],
    data() {
        return {
            patients: [],
            searchInput : ''
        };
    },
    methods: {
        searchFunc() {
            axios.get(route("patients.search", this.searchInput)).then((res) => {
                if (res.data != '') {
                    this.patients = res.data;
                } else {
                    this.patients = []
                }
            });
        },
        add(patient){
            this.$emit('patient-add', { patient: patient.id })
            this.searchInput = patient.nom
            this.patients = []
        }
    },
    mounted() {
        if(this.patient!='')
        this.searchInput = this.patient.nom;
    },
};
</script>