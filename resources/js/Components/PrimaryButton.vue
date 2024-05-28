<script setup>

defineProps(['text','icon'])






</script>
<template>
    <button
        class="transition-all duration-300 ease-in-out w-max  text-white font-medium rounded-2xl border-2 bg-gradient-to-tl from-blue-500 via-purple-600 to-indigo-400 px-4 py-2 hover:text-white hover:bg-white hover:bg-gradient-to-tl hover:from-indigo-500 hover:via-purple-700 hover:to-purple-400">
         {{ text }} <font-awesome-icon v-if="icon" :icon="icon" />
    </button>
</template>