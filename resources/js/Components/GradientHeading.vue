<script setup>
const props = defineProps({
    text: {
        type: String,
    },
});
</script>

<template>
    <h4
        v-motion-pop-visible
        class="transition-all duration-500 ease-in-out text-3xl text-center font-bold bg-gradient-to-r from-blue-800 via-purple-600 to-indigo-500  bg-clip-text text-transparent"
    >
        {{ text }}
    </h4>
</template>
