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
        <label :for="id" class="block mb-2 font-medium text-gray-900 text-sm">
            {{ label }}

            <span v-if="compulsory" class="text-red-500">*</span>
        </label>

        <select :id="id" :name="name"
            class="bg-gray-50 border border-gray-300 text-gray-500 rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-3">
            <slot />
        </select>
    </div>
</template>