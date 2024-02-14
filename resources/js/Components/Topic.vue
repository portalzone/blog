<script setup>
import { reactive, onMounted } from "vue";
import { router } from "@inertiajs/vue3";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import TextArea from "@/Components/TextArea.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { useForm } from "@inertiajs/vue3";
import { useToast } from "vue-toastification";
import axios from "axios";

const toast = useToast();
const form = useForm({
    post_name: null,
    post_body: null,
    category: null,
    avatar: null,
    created_by: null,
});

const getCurrentUser = async () => {
    try {
        const response = await axios.get("http://localhost:8000/api/current-user");
        return response.data.user.id;
    } catch (error) {
        console.error("Error fetching current user ID:", error);
        return null;
    }
};

const submit = async () => {
    form.created_by = await getCurrentUser();

    form.post("posts", {
        preserveScroll: true,
        onSuccess: () => {
            toast.success("Post successfully created!!!");
            form.reset();
        },
    });
};

const handleInput = (e) => {
    form.clearErrors(e.target.name);
};
</script>


<template>
    <div>
        <div class="p-6 lg:p-2 bg-white border-b border-gray-200">
            <h1 class="mt-8 text-2xl font-medium text-gray-900">
                Post Management Portal
            </h1>

            <p class="mt-6 text-red-500 leading-relaxed">
                <span class="font-bold">Caution!!! </span>You have to be extra
                careful while executing any action.
            </p>
        </div>

        <div
            class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8"
        >
            <div class="col-span-6 sm:col-span-4">
                <form @submit.prevent="submit">

                    <InputLabel for="category_name">Category name:</InputLabel>
                    <select class="mt-1 block w-full rounded" v-model="form.category">
                        <option value="">Select Category</option>
                        <option
                            v-for="category in categories"
                            :key="category.id"
                            name="category"
                            :value="category.id"
                        >
                            {{ category.category_name }}
                        </option>
                    </select>
                    <InputError
                        :message="form.errors.category"
                        class="mt-2 mb-3"
                    />
                    <InputLabel for="post_name">Post Title:</InputLabel>
                    <TextInput
                        id="post_name"
                        class="mt-1 block w-full"
                        v-model="form.post_name"
                        name="post_name"
                        @input="handleInput"
                    />
                    <InputError
                        :message="form.errors.post_name"
                        class="mt-2 mb-3"
                    />
                    <InputLabel for="post_body">Post Body:</InputLabel>
                    <TextArea
                        id="post_body"
                        class="mt-1 block w-full"
                        v-model="form.post_body"
                        name="post_body"
                        @input="handleInput"
                    />
                    <InputError
                        :message="form.errors.post_body"
                        class="mt-2 mb-3"
                    />
                    <PrimaryButton
                        type="submit"
                        :disabled="form.processing"
                        class="mt-3 mb-3"
                        >Submit</PrimaryButton
                    >
                </form>
            </div>
        </div>
    </div>
</template>


<script>
import axios from "axios";
export default {
    data() {
        return {
            categories: [],
        };
    },
    mounted() {
        console.log("Component mounted.");
        this.categoryList();
    },
    methods: {
        categoryList() {
            axios
                .get("http://localhost:8000/api/category-list")
                .then((res) => {
                    this.categories = res.data.data;
                })
                .catch((err) => {
                    console.log(err);
                });
        },
    },
};
</script>
