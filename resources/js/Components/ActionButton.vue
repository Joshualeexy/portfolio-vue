<script setup>
import Image from "@/Components/Image.vue";

const props = defineProps({
    image: {
        default: "",
    },
    icon: {
        default: "",
    },
    text: {
        required: true,
    },
});
</script>

<template>
    <button
        v-motion-pop-visible
        class="text-sm rounded-full text-center flex gap-2 justify-center items-center border-4 p-3 transition-all duration-300 ease-in-out hover:text-white font-medium"
    >
        <Image v-if="image" :name="image" class="w-7 h-7 rounded-full" />
        <font-awesome-icon v-if="icon" :icon="icon" />

        <span>{{ text }}</span>
</button>
</template>
