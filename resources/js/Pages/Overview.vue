<script setup>
import Section from "@/Components/NewSection.vue";

// import overview compnents //
import OverviewContact from "@/Components/OverviewContactInfo.vue";
import OverviewAbout from "@/Components/OverviewAbout.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";

import { library } from "@fortawesome/fontawesome-svg-core";
import { faUserPlus } from "@fortawesome/free-solid-svg-icons";
library.add(faUserPlus);

function gotolinkedin() {
    window.location.href =
        "https://linkedin.com/in/joshua-oghenekevwe-560a912a0/";
}
</script>

<template>
    <Section class="md:rounded-2xl py-0 px-0 relative">
        <!-- rounded profile photo starts here  -->
        <div
            v-motion-pop-visible
            class="transition-all duration-500 absolute top-16 md:top-24 left-4"
        >
            <img
                src=" /storage/assets/images/portfolio-profile-pic.jpeg"
                alt=""
                v-motion-pop-visible
                class="rounded-full md:w-40 w-32 border-white border-4"
            />
        </div>
        <!-- cover photo starts here  -->
        <div
            class="h-32 md:h-48 w-full md:rounded-t-2xl bg-[url('/storage/assets/images/computer-dark.png')] bg-center bg-no-repeat bg-cover bg-fixed"
        ></div>
        <!-- overview contact info and about components starts here  -->
        <div class="w-full rounded-b-2xl px-5 bg-white">
            <div class="flex justify-end relative bottom-2">
                <PrimaryButton
                    text="Connect"
                    icon="fab fa-linkedin"
                    @click="gotolinkedin"
                    v-motion-pop-visible
                />
            </div>
            <div class="flex justify-between flex-col md:flex-row">
                <OverviewContact class="" />

                <OverviewAbout class="" />
            </div>
        </div>
    </Section>
</template>
