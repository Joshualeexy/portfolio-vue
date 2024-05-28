<script setup>
import Languages from "@/Components/Languages.vue";
import BlogPreview from "@/Components/BlogPreview.vue";
const props = defineProps(["BlogPosts"]);
</script>

<template>
    <Languages class="mb-20" />
    <br />
    <BlogPreview :BlogPosts="BlogPosts" :showSearch="false" />
</template>
