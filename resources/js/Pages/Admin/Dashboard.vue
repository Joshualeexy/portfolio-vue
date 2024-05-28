<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
</script>

<template>
    
    <AuthenticatedLayout>
        <Head title="Dashboard" />
        <section class="h-screen w-sccreen bg-gray-200" >
           <h2 class="capitalize text-3xl font-medium mx-auto pt-40 w-max">this is the dashboard</h2>
        </section>
    </AuthenticatedLayout>
</template>
