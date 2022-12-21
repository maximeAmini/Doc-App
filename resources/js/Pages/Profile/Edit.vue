<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import UpdatePasswordForm from './Partials/UpdatePasswordForm.vue';
import UpdateProfileInformationForm from './Partials/UpdateProfileInformationForm.vue';
import { Head } from '@inertiajs/inertia-vue3';

defineProps({
    mustVerifyEmail: Boolean,
    status: String,
});
</script>

<template>
    <AuthenticatedLayout>
        <div class="flex align-center">
            <div>
                <h2 class="font-bold text-3xl text-gray-800 leading-tight">Mettre a jour son profile</h2>
            </div>
        </div>

        <div class="py-12 w-full mx-auto sm:px-6 lg:px-8">
            <div class="mb-6 grid grid-cols-3 items-center justify-center">
                <hr>
                <h3 class="font-bold text-center text-lg">Informations de profile</h3>
                <hr>
            </div>
            <UpdateProfileInformationForm :must-verify-email="mustVerifyEmail" :status="status" class="w-full" />

        </div>
        <div class="w-full mx-auto sm:px-6 lg:px-8">
            <div class="mb-6 grid grid-cols-3 items-center justify-center">
                <hr>
                <h3 class="font-bold text-center text-lg">Modifier le mot de passe</h3>
                <hr>
            </div>
                <UpdatePasswordForm class="w-full" />
        </div>
    </AuthenticatedLayout>
</template>
