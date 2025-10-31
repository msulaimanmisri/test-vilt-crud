<script setup>
    defineProps({
        form: {
            type: String,
            default: null,
        },

        label: {
            type: String,
            required: true,
        },

        disabled: {
            type: Boolean,
            default: false,
        },
    });
</script>

<template>
    <button type="submit" :form="form" :disabled="disabled" class="text-white bg-blue-600 py-3 px-5 rounded-lg text-sm">
        {{ label }}
    </button>
</template>