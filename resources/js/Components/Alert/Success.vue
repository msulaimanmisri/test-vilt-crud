<script setup>
    defineProps({
        message: {
            type: String,
            required: true,
        },
    });
</script>

<template>
    <div class="bg-green-200 border border-teal-500 text-teal-800 rounded-xl shadow px-4 py-3 mb-6" role="alert">
        <p>
            {{ message }}
        </p>
    </div>
</template>