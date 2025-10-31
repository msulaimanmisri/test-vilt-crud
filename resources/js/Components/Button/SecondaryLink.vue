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
    <Link :href="location" class="text-slate-500 bg-white hover:text-slate-900 py-3 px-5 rounded-lg text-sm">
    {{ label }}
    </Link>
</template>