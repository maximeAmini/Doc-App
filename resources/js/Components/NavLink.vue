<script setup>
import { computed } from 'vue';
import { Link } from '@inertiajs/inertia-vue3';

const props = defineProps(['href', 'active']);

const classes = computed(() =>
    props.active
        ? 'w-full p-2 mt-2 text-[#FF7C50] font-bold'
        : 'w-full p-2 mt-2 text-gray-500 rounded hover:text-[#FF7C50] transition-all'
);
</script>

<template>
    <Link :href="href" :class="classes">
        <slot />
    </Link>
</template>
