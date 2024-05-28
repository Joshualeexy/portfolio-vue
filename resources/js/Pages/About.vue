<script setup>
import Section from "@/Components/NewSection.vue";
import Heading from "@/Components/Heading.vue";
import SkillOverview from "@/Components/SkillOverview.vue";
import { library } from "@fortawesome/fontawesome-svg-core";
import { faGem } from "@fortawesome/free-regular-svg-icons";
import { faArrowRight } from "@fortawesome/free-solid-svg-icons";
library.add(faGem, faArrowRight);

const Topskills = [
    "Laravel",

    "VueJs",

    "PHP",

    "MySQL",

    "Javascript",

    "CSS",

    "Taiwind"
];
</script>

<template>
    <Section class="z-0">
        <Heading title="About" />
        <div >
            <p class="font-[courier-new]  transition-all duration-200 ease-in">
                Hello there! My name is Joshua a passionate Fullstack
                Developer based in Nigeria. with over 3 years of hands-on
                experience. I've delved into various aspect of web development
                and Problem Solving, When I'm not immersed in writing code, you
                can find me perfecting my jump shot on the basketball court or
                enjoying a refreshing swim,
                <br />
                <br />
                My journey in tech began before I entered in to the university
                and I took it further by obtaining a Diploma in Computer
                Science, Currently I'm continuing my bachelor's degree in computer
                science aiming to deepen my understandig in the field.
                <br />
                <br />
                I thrive in the challenges that comes with creating seemless
                user experience and bringing innovative ideas to life visually
                through technology.
            </p>
        </div>
        <SkillOverview title="Top Skills" :Skills="Topskills" />
    </Section>
</template>
