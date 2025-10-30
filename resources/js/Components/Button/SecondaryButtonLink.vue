<script setup>
    import { Link } from '@inertiajs/vue3';

    defineProps({
        location: {
            type: String,
            default: '#',
        },

        label: {
            type: String,
            required: true,
        },
    });
</script>

<template>
    <Link :href="location"
        class="text-slate-500 bg-white hover:bg-slate-300 hover:text-slate-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">
    {{ label }}
    </Link>
</template>