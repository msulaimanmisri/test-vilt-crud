<script setup>
    import { Form } from '@inertiajs/vue3'
    import InputField from '@/Components/Form/InputField.vue'
    import TextAreaField from '@/Components/Form/TextAreaField.vue';
    import SelectField from '@/Components/Form/SelectField.vue';
</script>

<template>
    <Form :action="route('tasks.store')" method="post" id="taskCreateForm">
        <div class="space-y-6">
            <div id="title_and_main_task" class="flex gap-4">
                <div class="w-full">
                    <InputField label="Title" id="title" name="title" :compulsory="true" />
                </div>

                <div class="w-full">
                    <SelectField label="Main task" id="parent_id" name="parent_id">
                        <option value=""></option>
                        <option value="task 1">Task 1</option>
                        <option value="task 2">Task 2</option>
                        <option value="task 3">Task 3</option>
                    </SelectField>
                </div>
            </div>

            <div id="description">
                <TextAreaField label="Description" id="description" name="description" />
            </div>

            <div id="duedate_priority_status" class="flex gap-4">
                <div class="w-full">
                    <InputField type="date" label="Due Date" id="due_date" name="due_date" />
                </div>

                <div class="w-full">
                    <SelectField label="Priority" id="priority" name="priority">
                        <option value="low">Low</option>
                        <option value="medium">Medium</option>
                        <option value="high">High</option>
                        <option value="urgent">Urgent</option>
                    </SelectField>
                </div>

                <div class="w-full">
                    <SelectField label="Status" id="status" name="status">
                        <option value="draft">Draft</option>
                        <option value="in_progress">In Progress</option>
                        <option value="pending">Pending</option>
                        <option value="completed">Completed</option>
                    </SelectField>
                </div>
            </div>
        </div>

        <div id="buttonCta" class="mt-8">
            <button type="submit" class="px-4 py-2 text-white bg-blue-600 rounded-md hover:bg-blue-700">
                Create Task
            </button>
        </div>
    </Form>
</template>