<script setup>
import GradientHeading from "@/Components/GradientHeading.vue";
</script>

<template>
    <div class="mt-10 mb-10 w-full md:w-7/12 transition-all duration-700">
        <GradientHeading
            text="Full Stack Web Developer"
            class="mb-5 !text-2xl !text-left"
        />

        <p v-motion-pop-visible class="font-[courier-new]  leading-8 transition-all duration-1000">
            I’m Joshua, a fullstack developer based in Abraka, Nigeria.
            An experienced web developer with expertise in designing, developing,
            and maintaining the web. Proficient in various platforms, languages,
            and frameworks, including Vuejs, Laravel, PHP, Javascript, and Wordpress.
        </p>
    </div>
</template>
