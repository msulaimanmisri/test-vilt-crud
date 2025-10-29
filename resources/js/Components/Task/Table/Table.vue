<script setup>
    import Thead from '@/Components/Task/Table/Thead.vue';
    import Tdata from '@/Components/Task/Table/Tdata.vue';

    defineProps({
        tasks: {
            type: Array,
            default: () => [],
        },
    });
</script>

<template>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <Thead label="#" />
                    <Thead label="Title" />
                    <Thead label="Description" />
                    <Thead label="Priority" />
                    <Thead label="Status" />
                </tr>
            </thead>

            <tbody>
                <template v-if="tasks.length">
                    <Tdata v-for="(task, index) in tasks" :key="task.id" :task="task" :index="index" />
                </template>

                <tr v-else class="bg-white text-center">
                    <td class="px-6 py-12" colspan="5">No tasks found.</td>
                </tr>
            </tbody>
        </table>
    </div>

</template>