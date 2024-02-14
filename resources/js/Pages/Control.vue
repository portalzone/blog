<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import AdminPage from "@/Components/AdminPage.vue";
</script>
<template>
    <AppLayout title="Control Panel">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Admin portal
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <AdminPage />
                </div>
            </div>
        </div>
    </AppLayout>
</template>