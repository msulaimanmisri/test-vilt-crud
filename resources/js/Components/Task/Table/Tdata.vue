<script setup>
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
    <tr class="bg-white border-b hover:bg-gray-50">
        <td class="px-6 py-4">{{ index + 1 }}</td>
        <td class="px-6 py-4">{{ task.title }}</td>
        <td class="px-6 py-4">{{ task.description }}</td>
        <td class="px-6 py-4">{{ task.priority }}</td>
        <td class="px-6 py-4">{{ task.status }}</td>
    </tr>
</template>