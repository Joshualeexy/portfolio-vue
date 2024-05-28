<script setup>
import { ref } from "vue";

const model = defineModel({
    type: String,
});
</script>

<template>
    <input class="border-none focus:ring-0" v-model="model" />
</template>
