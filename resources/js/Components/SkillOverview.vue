<script setup>
import Heading from "@/Components/Heading.vue";
defineProps(["Skills", "title"]);
</script>

<template>
    <div
        v-motion-pop-visible
        class=" p-5 rounded-xl transition-all duration-300 ease-in-out"
    >
        <div
            v-motion-pop-visible
            class="flex items-center gap-2 text-gray-700 transition-all duration-300 ease-in-out"
        >
            <font-awesome-icon :icon="['far', 'gem']" class="text-lg" />
            <Heading :title="title" class="text-lg" />
        </div>

        <div
            v-motion-pop-visible
            class="flex justify-between transition-all duration-500 ease-in-out"
        >
            <ul class="flex gap-2 flex-wrap">
                <li v-for="skill in Skills" class="text-gray-700 text-sm">
                    {{ skill }}&nbsp;,
                </li>
            </ul>
            <font-awesome-icon icon="arrow-right" />
        </div>
    </div>
</template>
