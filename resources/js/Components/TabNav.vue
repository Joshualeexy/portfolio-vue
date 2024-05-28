<script setup>

const props = defineProps({
    TabNavList: {
        type: Array,
    }, selected: {
        type: String,
    },
});

defineEmits(['MakeActive'])
</script>

<template>
    <ul class="transition-all duration-300 ease-in grid md:grid-cols-3 md:p-10 pt-5 grid-cols-2 gap-1 md:w-6/12 w-full  mb-10 justify-center"
        v-motion-pop-visible >
        <li v-for="(Tab, index) in TabNavList" @click="$emit('MakeActive', Tab)"
            class="transition-all duration-500 ease-in-out text-center  border-2 border-x-purple-400 border-y-blue-400 cursor-pointer font-medium py-2 rounded-md"
            :class="{ active: selected == Tab }">
            {{ Tab }}
        </li>
    </ul>
</template>


<style>
.active {
    background-image: linear-gradient(to top right, rgb(209, 11, 209), rgba(39, 67, 227, 0.701), rgb(115, 22, 181));
    color: white;
}
</style>