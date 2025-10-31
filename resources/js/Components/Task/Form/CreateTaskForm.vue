<script setup>
    import { Form } from '@inertiajs/vue3'
    import InputField from '@/Components/Form/InputField.vue'
    import TextAreaField from '@/Components/Form/TextAreaField.vue';
    import SelectField from '@/Components/Form/SelectField.vue';
    import PrimarySubmit from '@/Components/Button/PrimarySubmit.vue';
    import SecondaryLink from '@/Components/Button/SecondaryLink.vue';

    // Props
    defineProps({
        tasks: {
            type: Array,
            default: () => [],
        },
    });
</script>

<template>
    <Form :action="route('tasks.store')" method="post" id="taskCreateForm" #default="{ processing, errors }">
        <div class="space-y-6">
            <div id="title_and_main_task" class="flex gap-4">
                <div class="w-full">
                    <InputField label="Title" id="title" name="title" :compulsory="true" :error="errors.title" />
                </div>

                <div class="w-full">
                    <SelectField label="Main task" id="parent_id" name="parent_id" :error="errors.parent_id">
                        <option value="">-</option>
                        <option v-for="(task, index) in tasks" :key="task.id" :task="task" :index="index"
                            :value="task.id">
                            {{ task.title }}
                        </option>
                    </SelectField>
                </div>
            </div>

            <div id="description">
                <TextAreaField label="Description" id="description" name="description" :error="errors.description" />
            </div>

            <div id="duedate_priority_status" class="flex gap-4">
                <div class="w-full">
                    <InputField type="date" label="Due Date" id="due_date" name="due_date" :error="errors.due_date" />
                </div>

                <div class="w-full">
                    <SelectField label="Priority" id="priority" name="priority" :error="errors.priority">
                        <option value="4">Low</option>
                        <option value="3">Medium</option>
                        <option value="2">High</option>
                        <option value="1">Urgent</option>
                    </SelectField>
                </div>

                <div class="w-full">
                    <SelectField label="Status" id="status" name="status" :error="errors.status">
                        <option value="1">Draft</option>
                        <option value="2">In Progress</option>
                        <option value="3">Pending</option>
                        <option value="4">Completed</option>
                    </SelectField>
                </div>
            </div>
        </div>

        <div id="buttonCta" class="mt-8">
            <PrimarySubmit label="Create Task" :disabled="processing" />
            <SecondaryLink label="Cancel" :location="route('tasks.index')" />
        </div>
    </Form>
</template>