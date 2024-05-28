<script setup>
import Languages from "./Languages.vue";
import BlogPreview from "./BlogPreview.vue";
const props = defineProps(['BlogPosts'])
</script>

<template>
    <div class="flex-col gap-2 w-full hidden md:flex md:w-3/12 ">
        <slot>
            <Languages v-motion-pop-visible />
            <BlogPreview md="1" lg="1" amount="9" :BlogPosts="BlogPosts" :show-search="false"/>
        </slot>
    </div>
</template>
