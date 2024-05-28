<script setup>
import TopNav from "@/Components/TopNav.vue";
import SideBar from "@/Components/SideBar.vue";
import Footer from "@/Components/Footer.vue";
import NavLinks from "@/Components/NavLinks.vue";
import BlogPreview from "@/Components/BlogPreview.vue";
import { Link } from "@inertiajs/vue3";

import { ref } from "vue";
const Status = ref(false);

function handleNav() {
    Status.value = !Status.value;
}


function scrolltotop() {
    globalThis.scrollTo({ top: 0, left: 0, behavior: "smooth" });
}
const navLink = [
    {
        id: 6,
        route: "admin.dashboard",
        label: "Dashboard",
        icon: "dashboard",
        method: "",
    },
    {
        id: 1,
        route: "admin.blogpost.index",
        label: "Blog",
        icon: "blog",
    },
    {
        id: 2,
        route: "admin.languages",
        label: "Language",
        icon: "language",
    },
    {
        id: 3,
        route: "admin.skills",
        label: "Skills",
        icon: "medal",
    },
    {
        id: 4,
        route: "admin.project",
        label: "Projects",
        icon: "briefcase",
    },
    {
        id: 5,
        route: "logout",
        label: "Logout",
        icon: "user-slash",
        method: "POST",
    },
];
</script>

<template>
    <TopNav class="z-50" @closenav="handleNav" :Status="Status">
        <template #desktop>
            <NavLinks>
                <ul class="flex gap-8 border-r-2 border-gray-200 pr-3 mr-3">
                    <li
                        v-for="link in navLink"
                        :key="link.id"
                        :class="{
                            'bg-indigo-300/25 p-2 rounded':
                                link.route.replace('.', '') ==
                                $page.url.replaceAll('/', ''),
                        }"
                        class="mylink"
                    >
                        <Link
                            :href="route(link.route)"
                            :method="link.method"
                            as="button"
                            class="text-sm flex flex-col items-center text-gray-600"
                        >
                            <font-awesome-icon
                                :icon="link.icon"
                                class="font-bold text-[1rem]"
                            />
                            {{ link.label }}
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
                    class="mylink p-3 rounded transition-all duration-300"
                    :class="{
                        'bg-purple-100/25':
                            link.route.replace('.', '') ==
                            $page.url.replaceAll('/', ''),
                    }"
                >
                    <Link
                        :href="route(link.route)"
                        :method="link.method"
                        as="button"
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
            <SideBar>
                <slot name="sidebar">
                    <BlogPreview
                        v-motion-pop-visible
                        md="1"
                        lg="1"
                        amount="1"
                    />
                </slot>
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
