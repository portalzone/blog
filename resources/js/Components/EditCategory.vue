<script setup>
import { ref } from 'vue';
import { router } from "@inertiajs/vue3";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { useToast } from "vue-toastification";
import { usePage } from '@inertiajs/inertia-vue3';

const toast = useToast();
const { props: { category } } = usePage();
const category_name = ref(category.category_name);

function submit() {
    // Make a request to update the category
    // This is just a placeholder, you need to implement your own logic
    axios.put(`/api/categories/${category.id}`, { category_name: category_name.value })
        .then(() => {
            toast.success("Category successfully updated!!!");
            router.replace(router.currentRoute.value);
        })
        .catch(error => {
            console.error('Error updating category:', error);
            // Handle error
        });
}

function handleInput() {
    // Handle input if needed
}
</script>

<template>
    <div>
        <div class="p-6 lg:p-2 bg-white border-b border-gray-200">
            <h1 class="mt-8 text-2xl font-medium text-gray-900">
                Edit Category
            </h1>

            <p class="mt-6 text-red-500 leading-relaxed">
                <span class="font-bold">Caution!!! </span>You have to be extra
                careful while executing any action.
            </p>
        </div>

        <div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8">
            <div class="col-span-6 sm:col-span-4">
                <form @submit.prevent="submit">
                    <InputLabel for="category_name">Category name:</InputLabel>
                    <TextInput
                        id="category_name"
                        class="mt-1 block w-full"
                        v-model="category_name"
                        name="category_name"
                        @input="handleInput"
                    />
                    <InputError
                        :message="form.errors.category_name"
                        class="mt-2 mb-3"
                    />
                    <PrimaryButton
                        type="submit"
                        class="mt-3 mb-3"
                        :disabled="form.processing"
                    >Submit</PrimaryButton>
                </form>
            </div>
        </div>
    </div>
</template>
