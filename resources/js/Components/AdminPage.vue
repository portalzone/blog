<script setup>
import Topic from '@/Components/Topic.vue';
import Category from '@/Components/Category.vue';
import EditCategory from './EditCategory.vue';
</script>

<template>
    <div>
        <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
            

            <h1 class="mt-8 text-2xl font-medium text-gray-900">
                Welcome to your control panel
            </h1>

            <p class="mt-6 text-gray-500 leading-relaxed">
                Below are the followin rights and priviledges assigned to you.
            </p>
        </div>

        <div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8">
            <div>

                <p class="mt-4 text-gray-500 text-sm leading-relaxed">
                    <Category/>
                </p>

               
            </div>

            <div>

                <p class="mt-4 text-gray-500 text-sm leading-relaxed">
                    <Topic/>
                </p>

               
            </div>

            <div>

                <p class="mt-4 text-gray-500 text-sm leading-relaxed">
                    <EditCategory/>
                </p>
            </div>

            <div>
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="w-6 h-6 stroke-gray-400">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                    </svg>
                    <h2 class="ms-3 text-xl font-semibold text-gray-900">
                        Authentication
                    </h2>
                </div>

                <p class="mt-4 text-gray-500 text-sm leading-relaxed">
                    Authentication and registration views are included with Laravel Jetstream, as well as support for user email verification and resetting forgotten passwords. So, you're free to get started with what matters most: building your application.
                </p>
            </div>
        </div>
    </div>
</template>
