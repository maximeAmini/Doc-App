<script setup>
import { ref } from 'vue';
import NavHori from '@/Components/Nav/NavHori.vue';
import NavTop from '@/Components/Nav/NavTop.vue';

const showingNavigationDropdown = ref(false);
</script>

<template>
    <div>
        <div class="min-h-screen flex">
            
            <NavTop />
            <NavHori />
            <!-- Page Content -->
            <main class="w-full py-6 sm:py-8 px-6 sm:px-12  sm:pl-60 mt-16">
                <slot />
            </main>
        </div>
    </div>
</template>
