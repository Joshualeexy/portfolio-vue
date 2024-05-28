<script setup>
defineProps(["Skills"]);
const emit = defineEmits(["deleteskill"]);
import { Link } from "@inertiajs/vue3";
</script>
<template>
    <div
        class="w-full grid grid-cols-2 sm:grid-cols-4 place-items-center gap-3 relative"
    >
        <div
            v-for="skill in Skills"
            :key="skill.id"
            class="group shadow-md shadow-purple-400 transition-all duration-300 ease-in flex items-center justify-center uppercase -purple-800 hover:border-x-purple-400 hover:border-y-blue-400 cursor-pointer font-medium h-32 w-32 rounded-full"
            v-motion-pop-visible
        >
            <div
                class="grid place-items-center transition-all duration-300 ease-in-out"
            >
                <img :src="`../storage/${skill.img}`" class="w-7 h-7 rounded-full" />
                <div
                    v-if="$page.props.auth.user && $page.props.auth.user.name == 'Admin'"
                    class="group-hover:flex gap-4 p-2 hidden transition-all duration-300 ease-in-out"
                >
                    <font-awesome-icon
                        v-motion-pop-visible
                        icon="remove"
                        @click="emit('deleteskill', skill.id)"
                        class="text-red-400"
                    />

                    <Link :href="route('skill.edit', skill.id)">
                        <font-awesome-icon
                            v-motion-pop-visible
                            icon="edit"
                            class="text-blue-600"
                    /></Link>
                </div>
                <h4 class="font-[courier-new] "> {{ skill.name }}</h4>
            </div>
        </div>
    </div>
</template>
