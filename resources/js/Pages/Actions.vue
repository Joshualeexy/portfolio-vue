<template>
    <NewSection>
        <GradientHeading text="Got What You need ? Hire Me" />
        <p class="text-center text-sm mb-10">
            My role is to listen and trust,Code and redesign, present and
            deliver. <br />
            I am currently accepting new freelance jobs.
        </p>

        <div
            class="grid grid-cols-2 sm:grid-cols-3 gap-5 items-center content-center"
        >
            <!-- upwork hire me link starts here  -->

            <ActionLink
                text="Hire Me"
                href="https://www.upwork.com/freelancers/~019e0935884bc75dd9"
                image="upwork.png"
                class="border-green-600 text-green-600 p-3 hover:bg-green-600 hover:border-green-500"
            />
            <!-- upwork hire me link ends here  -->

            <!-- Linkedin hire me link starts here  -->
            <ActionLink
                text="Hire Me"
                href="https://www.linkedin.com/in/joshua-oghenekevwe-560a912a0"
                image="linkedin.png"
                class="border-[#0077B5] text-[#0077B5] p-3 hover:bg-[#0077B5] hover:border-blue-400"
            />
            <!-- linkedin hire me link ends here  -->

            <!-- Fiverr hire me link starts here  -->

            <ActionLink
                text="Hire Me"
                href="https://www.fiverr.com/joshua_leexy"
                image="fiverr.png"
                class="border-green-700 text-green-700 p-3 hover:bg-green-600 hover:border-green-500 col-span-2 md:col-span-1"
            />
            <!-- fiverr hire me link ends here  -->
        </div>
        <!-- download cv and resume section starts here  -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 mt-5">
            <ActionLink
                :href="route('downloadresume')"
                text="Download Resume"
                icon="file"
                el="a"
                class="border-purple-600 text-purple-600 p-3 hover:bg-purple-600 hover:border-purple-500"
            />
            <!-- upwork hire me link ends here  -->

            <ActionLink
                text="Download Cv"
                :href="route('downloadcv')"
                icon="file"
                el="a"
                class="border-blue-500 text-blue-500 p-3 hover:bg-blue-500 hover:border-blue-400"
            />
        </div>
    </NewSection>
</template>

<script setup>
import NewSection from "@/Components/NewSection.vue";
import GradientHeading from "@/Components/GradientHeading.vue";
import ActionLink from "@/Components/ActionLink.vue";
</script>
