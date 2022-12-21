<script setup>
defineProps(['value']);
</script>

<template>
    <label class="block mb-2 text-sm text-gray-900 font-bold ">
        <span v-if="value">{{ value }}</span>
        <span v-else><slot /></span>
    </label>
</template>
