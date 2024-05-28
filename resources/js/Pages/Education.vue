<script setup>
import Section from "@/Components/NewSection.vue";
import Heading from "@/Components/Heading.vue";
import { ref } from "vue";

const Educations = ref([
    {
        title: "BSC",
        major: "Computer Science",
        status: "Undergraduate  ",
        start: "June 2022",
        end: "present",
    },
    {
        title: "DIPLOMA ",
        major: "Computer Science",
        status: "graduate  ",
        start: "Dec 2020",
        end: "August 2022",
    },
]);
</script>

<template>
    <Section>
        <Heading title="Education" />
        <div
            v-motion-pop-visible
            class="p-10 rounded transition-all duration-500 ease-in-out"
            v-for="Education in Educations"
            v-motion-slide-visible-bottom
        >
            <div class="flex gap-3 items-start">
                <font-awesome-icon :icon="['fas', 'user-graduate']" />
                <div class="text-sm">
                    <Heading :title="Education.title" />
                    <p>
                       <span class="font-[courier-new] "> {{ Education.major }}</span> •
                        <span class="font-[courier-new] "> {{ Education.status }}</span>
                    </p>
                    <p class="font-[courier-new] ">
                        <span>{{ Education.start }}</span> -
                        <span>{{ Education.end }}</span>
                    </p>
                </div>
            </div>
        </div>
    </Section>
</template>
