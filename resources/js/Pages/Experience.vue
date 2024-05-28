<script setup>
import Section from "@/Components/NewSection.vue";
import Heading from "@/Components/Heading.vue";
import SkillOverview from "@/Components/SkillOverview.vue";
import Image from "@/Components/Image.vue";
import { ref } from "vue";

const Experiences = ref([
    {
        title: "Web Developer",
        company: "Hamplus Technologies [Hamplus Hub]",
        role: "Internship",
        start: "Novemmber 2022",
        end: "Novemmber 2023",
        timespent: "1 yr",
        skills: ["Html", "PHP", "MySQL", "Javascript", "CSS"],
        img: "hamplus.png",
    },

    {
        title: "Freelancer",
        company: "Upwork Talent [Upwork]",
        role: "Fullstack Developer",
        start: "June 2022",
        end: "present",
        timespent: "1 yr 11 months",
        skills: ["Vuejs", "Laravel", "MySQL", "PHP", "CSS ", "Javascript"],
        img: "upwork.png",
    },
]);
</script>

<template>
    <Section>
        <Heading title="Experience" />
        <div
            class="p-10 rounded"
            v-for="Experience in Experiences"
            v-motion-slide-visible-bottom
        >
            <div class="flex gap-3 items-start">
                <Image
                    v-motion-pop-visible
                    :name="Experience.img"
                    class="transition-all duration-500 ease-in-out w-7 h-7 rounded-full"
                />

                <div
                    v-motion-pop-visible
                    class="text-sm mb-5 transition-all duration-700 ease-in-out"
                >
                    <Heading :title="Experience.title" />
                    <p clas="font-[courier-new] ">
                        <span class="font-[courier-new] ">{{ Experience.company }}</span> •
                        <span class="font-[courier-new] "> {{ Experience.role }}</span>
                    </p>
                    <p class="font-[courier-new] ">
                        <span>{{ Experience.start }}</span> -
                        <span>{{ Experience.end }}</span> •
                        <span> {{ Experience.timespent }}</span>
                    </p>
                </div>
            </div>
            <SkillOverview :Skills="Experience.skills" title="Skills" class=""/>
        </div>
    </Section>
</template>
