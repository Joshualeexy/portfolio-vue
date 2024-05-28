<script setup>
import SocialsIcons from "@/Components/SocialsIcons.vue";
import BadgeCheck from "@/Components/BadgeCheck.vue";
import GradientHeading from "@/Components/GradientHeading.vue";
import Modal from "@/Components/Modal.vue";

import { ref } from "vue";

const contactInfos = ref([
    {
        id: 1,
        icon: ["fab", "google"],
        info: "oghenekevwejoshualee@gmail.com",
        color: "text-red-400",
    },
    {
        id: 2,
        icon: ["fab", "whatsapp"],
        info: "+234 8142 196 994",
        color: "text-green-600",
    },
    {
        id: 3,
        icon: ["fab", "telegram"],
        info: "kevwe_joshua",
        color: "text-blue-400",
    },
]);

const ShowContact = ref(false);
function showcontact() {
    ShowContact.value = !ShowContact.value;
}
</script>

<template>
    <!-- <Modal  class="absolute"/> -->
    <div class="flex flex-col gap-1 mt-10 md:mb-10 relative">
        <Modal
            @ShowContacts="ShowContact = false"
            v-if="ShowContact"
            class="backdrop-blur-lg absolute top-[-13rem] backdrop-blusr bg-white shadow-2xl rounded-2xl h-max pb-5"
        >
            <div class="h-full">
                <GradientHeading text="Contact Info's" class="text-lg mt-4" />
                <ul class="h-full px-4 pt-4 w-full">
                    <li
                        v-for="info in contactInfos"
                        :key="info.id"
                        v-motion-pop-visible
                        class="group font-[courier-new] shadow-lg bg-gray-100 py-2 rounded-xl font-semibold text-sm mb-3 transition-all duration-300 ease-in-out px-2 flex items-center gap-1"
                    >
                        <font-awesome-icon
                            v-motion-pop-visible
                            :icon="info.icon"
                            :class="info.color"
                        />
                        <span class="first-letter:capitalize text-gray-700">{{
                            info.info
                        }}</span>
                    </li>
                </ul>
            </div>
            ></Modal
        >

        <h1 class="flex items-center gap-1">
            <GradientHeading
                text="Joshua Oghenekevwe"
                class="!text-left !text-2xl mb-5 w-max"
            />

            <BadgeCheck
                class="-mt-4 transition-all duration-300 ease-in hover:animate-spin bg-gradient-to-tl from-blue-500 via-purple-600 to-indigo-400 rounded-full text-white border-2"
            />
        </h1>

        <p
            v-motion-pop-visible
            class="font-[courier-new]  text-gray-600 transition-all duration-500 ease-in text-balance"
        >
            <!-- Full Stack PHP | Laravel | Javascript | Vuejs | Developer -->
            Full Stack | PHP | Javascript | Developer
        </p>
        <p
            v-motion-pop-visible
            class="mb-5 transition-all duration-500 ease-in"
        >
            <span class="text-gray-400 font-[courier-new] ">Abraka Delta State, Nigeria </span>
            <button
                @click="showcontact"
                class="text-blue-500 font-medium hover:border-b p-0 border-blue-500"
            >
                Contact Info
            </button>
        </p>
        <SocialsIcons class="" />
    </div>
</template>
