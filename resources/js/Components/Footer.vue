<script setup>
import NewsLetter from "@/Components/NewsLetter.vue";
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
const props = defineProps({
    showNewsLetter:{
        default: true,
    }
})
</script>

<template>
    <NewsLetter class="mb-4"  v-if="showNewsLetter"/>
    <hr
        v-motion-pop-visible
        class="transition-all duration-1000 ease-in h-[2px] bg-purple-400 mb-4"
    />
    <p
        v-motion-pop-visible
        class="flex-wrap text-center bg-clip-text text-transparent bg-gradient-to-r from-blue-500 via-blue-900 to-black mb-8 font-bold flex items-center justify-center"
    >
        <ApplicationLogo class="mr-3" /> Designed And Developed with
        <span class="text-red-400">🧡</span> By Kevwe Joshua 2024
    </p>
</template>
