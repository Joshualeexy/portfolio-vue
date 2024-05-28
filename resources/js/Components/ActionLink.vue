<script setup>
import { Link } from "@inertiajs/vue3";
import Image from "@/Components/Image.vue";

const props = defineProps({
    image: {
        default: "",
    },
    icon: {
        default: "",
    },
    href: {
        default: "",
    },

    el: {
        default: "Link",
    },
    text: {
        required: true,
    },
});
</script>

<template>
    <a
        v-if="el.toLowerCase() === 'a'"
        v-motion-pop-visible
        :href="href"
        class="rounded-full text-center flex gap-2 justify-center items-center border-4 p-3 transition-all duration-300 ease-in-out hover:text-white"
        :class="$attrs.class"
    >
        <Image v-if="image" :name="image" class="w-7 h-7 rounded-full" />
        <font-awesome-icon v-if="icon" :icon="icon"/>
        <span>{{ text }}</span>
    </a>

    <Link
        v-if="el.toLowerCase() === 'link'"
        v-motion-pop-visible
        :href="href"
        class="rounded-full text-center flex gap-2 justify-center items-center border-4 p-3 transition-all duration-300 ease-in-out hover:text-white"
        :class="$attrs.class"
    >
        <Image v-if="image" :name="image" class="w-7 h-7 rounded-full" />
        <font-awesome-icon 
            v-if="icon"
            :icon="icon"
        />

        <span>{{ text }}</span>
    </Link>
</template>
