<script setup>
import TopNav from "@/Components/TopNav.vue";
import SideBar from "@/Components/SideBar.vue";
import Footer from "@/Components/Footer.vue";
import NavLinks from "@/Components/NavLinks.vue";
import { ref } from "vue";
const Status = ref(false);

function handleNav() {
    Status.value = !Status.value;
}

const showSidebar = ref(true);
const CurrentHref = ref(window.location.pathname);

function scrolltotop() {
    globalThis.scrollTo({ top: 0, left: 0, behavior: "smooth" });
}

const navLink = [
    {
        id: 1,
        route: "home",
        label: "Home",
        icon: "house",
    },
    {
        id: 2,
        route: "about",
        label: "About",
        icon: "address-card",
    },
    {
        id: 3,
        route: "skills",
        label: "Skills",
        icon: "medal",
    },
    {
        id: 4,
        route: "project",
        label: "Projects",
        icon: "briefcase",
    },
    {
        id: 5,
        route: "contact",
        label: "Contact",
        icon: "paper-plane",
    },
];

const host = window.location.host;
const emit = defineEmits(["setActiveCategory"]);
</script>

<template>
    <TopNav
        class="z-50"
        @closenav="handleNav"
        :Status="Status"
        :showSocial="false"
    >
        <template #desktop>
            <NavLinks>
                <ul class="flex gap-8">
                    <li v-for="link in navLink" :key="link.id">
                        <Link
                            :href="route(link.route)"
                            class="text-sm flex flex-col items-center text-gray-600"
                        >
                            <font-awesome-icon
                                :icon="link.icon"
                                class="font-bold text-[1rem]"
                            />
                            {{ link.label }}
                        </Link>
                    </li>
                    <li>
                        <Link
                            :href="route('blogpost.index')"
                            class="text-sm flex flex-col items-center text-gray-600"
                        >
                            <font-awesome-icon
                                icon="blog"
                                class="font-bold text-[1rem]"
                            />
                            Blog
                        </Link>
                    </li>
                </ul>
            </NavLinks>
        </template>

        <template #mobile>
            <ul
                class="flex flex-col bg-gradient-to-tr from-purple-300 via-indigo-400 to-purple-600 w-full p-3 gap-5 z-50 fixed right-[100%] transition-[right] ease-in-out pb-10 duration-700 top-16"
                :class="{ slidenav: Status }"
            >
                <li
                    v-for="link in navLink"
                    :key="link.id"
                    class="p-3 rounded"
                    :class="{
                        active: CurrentHref.replace('/', '').includes(
                            link.route
                        ),
                    }"
                >
                    <Link
                        :href="link.route"
                        class="text-sm flex items-center font-bold gap-2 text-gray-600 transition-all"
                    >
                        <font-awesome-icon
                            :icon="link.icon"
                            slide-visible-bottom
                            class="font-bold text-[1rem] p-2 rounded-md bg-gray-200"
                        />
                        {{ link.label }}
                    </Link>
                </li>
            </ul>
        </template>
    </TopNav>

    <div class="w-full flex justify-center z-0">
        <div
            class="md:flex md:justify-between md:w-10/12 w-full md:p-10 md:gap-8"
        >
            <main class="w-full p-2 md:w-9/12 z-0">
                <slot></slot>
                <Footer :showNewsLetter="false" />
            </main>
            <SideBar class="">
                <slot name="sidebar"> </slot>
            </SideBar>

            <font-awesome-icon
                @click="scrolltotop"
                icon="chevron-up"
                class="cursor-pointer animate-pulse transition-all duration-100 eae-in fixed inset-0 translate-x-[85vw] sm:translate-x-[95vw] translate-y-[92vh] text-purple-700 text-5xl"
            />
        </div>
    </div>
</template>

<style>
.slidenav {
    right: 0%;
}
</style>
