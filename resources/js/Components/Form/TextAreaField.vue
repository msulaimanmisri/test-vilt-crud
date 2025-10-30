<script setup>
    defineProps({
        label: {
            type: String,
            required: true
        },

        id: {
            type: String,
            required: true
        },

        name: {
            type: String,
            required: true
        },

        compulsory: {
            type: Boolean,
            default: false
        }
    });
</script>

<template>
    <div>
        <label :for="id" class="block mb-2 text-sm font-medium text-gray-900">
            {{ label }}

            <span v-if="compulsory" class="text-red-500">*</span>
        </label>

        <textarea :id="id" :name="name"
            class="block w-full p-3 text-gray-900 border border-gray-300 rounded-md bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
            rows="5"></textarea>
    </div>
</template>