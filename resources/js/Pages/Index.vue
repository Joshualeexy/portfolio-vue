<script setup>
import layout from "../Layouts/GuestLayout.vue";
import Overview from "./Overview.vue";
import About from "./About.vue";
import Skills from "./Skills.vue";
import Education from "./Education.vue";
import Experience from "./Experience.vue";
import Actions from "./Actions.vue";
import Contact from "./Contact.vue";
import Projects from "./Projects.vue";
import Blogpreview from "./Blogpreview.vue";
const props = defineProps(["Skills", "Projects", "BlogPosts"]);
</script>

<template>
    <div class="bg-lime-300"></div>
    <div class="bg-blue-300"></div>
    <div class="bg-orange-300"></div>
    <div class="bg-rose-300"></div>
    <div class="bg-blue-400"></div>
    <div class="bg-blue-300"></div>
    <div class="bg-violet-300"></div>
    <div class="bg-cyan-300"></div>
    <div class="bg-green-300"></div>
    <div class="bg-purple-300"></div>
    <div class="bg-red-400"></div>
    <div class="bg-pink-400"></div>
    <div class="bg-blue-600"></div>
    <div class="bg-yellow-500"></div>
    <div class="bg-emerald-400"></div>
    <div class="bg-yellow-300"></div>
    <layout :BlogPosts="BlogPosts">
        <Overview />
        <About id="about" class="mb-40" />
        <Skills id="skills" class="mb-40" :skills="props.Skills" />
        <Projects id="project" class="mb-40" :Projects="props.Projects" />
        <Experience id="experience" />
        <Education class="mb-20" />
        <Actions class="mb-20" />
        <Blogpreview :BlogPosts="BlogPosts" />
        <Contact id="contact" class="mb-40" />
    </layout>
</template>
