<script setup>
    defineProps({
        type: {
            type: String,
            default: 'text'
        },

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
        },

        error: {
            type: String,
            default: null
        },

        value: {
            type: [String, Number],
            default: null
        }
    });
</script>

<template>
    <div>
        <label :for="id" class="block mb-2 font-medium text-gray-900 text-sm">
            {{ label }}
            <span v-if="compulsory" class="text-red-500">*</span>
        </label>

        <input :type="type" :id="id" :name="name" :value="value"
            :class="['block w-full p-3 text-gray-900 border rounded-md bg-gray-50 focus:ring-blue-500 focus:border-blue-500', error ? 'border-red-500' : 'border-gray-300']" />

        <p v-if="error" class="mt-1 text-xs text-red-600">** {{ error }}</p>
    </div>
</template>