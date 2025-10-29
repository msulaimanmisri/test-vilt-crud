<script setup>
    defineProps({
        label: {
            type: String,
            required: true
        }
    });
</script>

<template>
    <th scope="col" class="px-6 py-3">
        {{ label }}
    </th>
</template>