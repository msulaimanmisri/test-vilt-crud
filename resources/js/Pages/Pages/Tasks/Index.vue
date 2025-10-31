<script setup>
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    import { Head, usePage } from '@inertiajs/vue3';
    import { computed } from 'vue';
    import Table from '@/Components/Task/Table/Table.vue';
    import ButtonLink from '@/Components/ButtonLink.vue';
    import SuccessAlert from '@/Components/Alert/Success.vue';

    const page = usePage();
    const tasks = computed(() => page.props.tasks ?? []);
</script>

<template>

    <Head title="Tasks List" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Tasks List
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <SuccessAlert v-if="page.props.flash?.success" :message="page.props.flash.success" />

                <div class="overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="flex justify-end mb-4">
                        <ButtonLink :location="route('tasks.create')" label="Create new tasks" />
                    </div>

                    <div>
                        <Table :tasks="tasks" />
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
