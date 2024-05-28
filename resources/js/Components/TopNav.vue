<script setup>
import ApplicationLogo from "./ApplicationLogo.vue";
import Hamburger from "./Hamburger.vue";
import SocialIcons from "./SocialsIcons.vue";
import TextInput from "./TextInput.vue";
import { useForm } from "@inertiajs/vue3";

const props = defineProps({
    showSocial: {
        default: true,
    },
    Status: {
        default: false,
    },
});
const emit = defineEmits(["closenav"]);
// const Status = ref(Status)

function Closenav() {
    emit("closenav");
}

const form = useForm({
    keyword: "",
});
</script>

<template>
    <header
        class="w-full bg-white md:py-2 flex justify-center items-center overflow-clip sticky top-0 z-10"
    >
        <nav
            class="hidden md:flex w-full md:w-9/12 justify-start items-center items-st bg-white px-3  py-5"
        >
            <div class="flex gap-2 md:w-1/3 w-6/12 items-center">
                <Link :href="route('home')">
                    <ApplicationLogo />
                </Link>

                <form class="w-full">
                    <label for="search" class="w-full">
                        <TextInput
                            v-model="form.keyword"
                            placeholder="search"
                            class="bg-gray-100 md:w-4/5 px-4 py-1"
                            id="search"
                        />
                    </label>
                </form>
            </div>
            <slot name="desktop"> </slot>

            <SocialIcons v-if="showSocial" class="hidden md:flex" />
        </nav>

        <!-- mobile nav  -->
        <nav class="relative w-screen flex flex-col justify-between md:hidden">
            <div class="flex justify-between items-center p-3 py-5">
                <Link :href="route('home')">
                    <ApplicationLogo />
                </Link>
                <SocialIcons v-show="Status" v-motion-slide-visible-right />
                <Hamburger :Status="Status" @click="Closenav" class="w-16" />
            </div>
            <div
                @click.self="Closenav"
                v-show="Status"
                class="backdrop-blur-sm bg-gray-400/40 fixed w-screen h-screen z-30 top-16"
            ></div>
            <slot name="mobile"></slot>
        </nav>
    </header>
</template>
