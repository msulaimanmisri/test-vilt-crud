<script setup>
    defineProps({
        formId: {
            type: String,
            required: true
        },
        isProcessing: {
            type: Boolean,
            default: false
        },
        label: {
            type: String,
            default: 'Create Task'
        },
        processingLabel: {
            type: String,
            default: 'Creating...'
        }
    });
</script>

<template>
    <button type="submit" :form="formId"
        class="px-5 py-2.5 me-2 mb-2 text-sm text-white bg-blue-600 rounded-md hover:bg-blue-700 disabled:bg-gray-400"
        :disabled="isProcessing">
        {{ isProcessing ? processingLabel : label }}
    </button>
</template>