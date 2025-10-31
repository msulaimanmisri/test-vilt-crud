<script setup>
import { Link } from '@inertiajs/vue3';

defineProps({
    task: {
        type: Object,
        required: true,
    },
    index: {
        type: Number,
        required: true,
    },
});
</script>

<template>
    <Link 
        :href="route('tasks.edit', task.uuid)"
        as="tr"
        class="bg-white border-b hover:bg-gray-50 cursor-pointer"
    >
        <td class="px-6 py-4">{{ index + 1 }}</td>
        <td class="px-6 py-4">{{ task.title }}</td>
        <td class="px-6 py-4">{{ task.description }}</td>
        <td class="px-6 py-4">{{ task.priority }}</td>
        <td class="px-6 py-4">{{ task.status }}</td>
    </Link>
</template>