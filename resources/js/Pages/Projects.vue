<script setup>
import NewSection from "@/Components/NewSection.vue";
import Heading from "@/Components/Heading.vue";
import { Swiper, SwiperSlide } from "swiper/vue";
import ActionButton from "@/Components/ActionButton.vue";
import { useToast } from "vue-toastification";
import { router, usePage } from "@inertiajs/vue3";

const toast = useToast();
const page = usePage();
import "swiper/css";
import "swiper/css/pagination";
import "swiper/css/effect-cube";
import "swiper/css/navigation";

import { Pagination, EffectCube, Navigation } from "swiper/modules";

const props = defineProps(["Projects"]);
function deleteProject(id) {
    router.delete(route("project.destroy", id), {
        onSuccess: () => {
            toast.success(page.props.success.message);
        },
    });
}
</script>

<template>
    <NewSection class="">
        <div
            v-if="!$page.component.toLowerCase().includes('admin')"
            class="py-4 px-2"
        >
            <h2
                v-motion-pop-visible
                class="transition-all duration-300 eae-in uppercase text-center text-4xl bg-clip-text text-transparent bg-gradient-to-r from-blue-800 via-purple-600 to-indigo-300 font-bold"
            >
                featured projects
            </h2>

            <p
                v-motion-pop-visible
                class="transitio-all ease-in duration-500 text-center text-gray-500"
            >
                Things I’ve made trying to put my mark in the digital universe.
            </p>
        </div>
        <div
            class="w-full flex gap-5 justify-center items-center px-2 py-0 sm:py-3"
        >
            <swiper
                class="w-10/12 h-full"
                :cubeEffect="{
                    shadow: false,
                }"
                navigation
                :loop="true"
                :modules="[EffectCube, Pagination, Navigation]"
                effect="cube"
            >
                <SwiperSlide
                    v-for="project in Projects"
                    class="w-10/12 transition-all duration-1000 ease-in-out shadow p-2 rounded-b-lg bg-gray-100"
                >
                    <div v-if="$page.component.toLowerCase().includes('admin')" 
                        class="w-full h-full flex justify-center cursor-pointer items-center absolute group hover:backdrop-blur-sm"
                    >
                        <div class="flex justify-center gap-2 items-center">
                            <ActionButton
                                icon="trash"
                                @click="deleteProject(project.id)"
                                text="Delete Project"
                                class="hidden group-hover:flex border-red-500 bg-red-500 hover:border-red-400 active:bg-gray-200"
                            />
                            <Link
                                :href="route('project.edit', project.id)"
                                preserve-scroll
                            >
                                <ActionButton
                                    icon="edit"
                                    text="Edit Project"
                                    class="border-teal-500 hidden group-hover:flex bg-teal-500 hover:border-teal-400 active:bg-gray-200"
                                />
                            </Link>
                        </div>
                    </div>
                    <div>
                        <div class="w-full">
                            <img
                                :src="`../storage/${project.image}`"
                                class="w-full h-full mb-8"
                                alt=""
                            />
                            <div class="">
                                <a :href="project.link" class="hover:underline">
                                    <Heading
                                        :title="project.name"
                                        class="text-left mb-2 text-2xl w-full"
                                    />
                                </a>
                                <p class="font-[courier-new] leading-6">
                                    {{ project.description }}
                                </p>
                            </div>
                            <div
                                class="my-4 grid gap-1 grid-cols-4 sm:grid-cols-7"
                            >
                                <span
                                    class="font-[courier-new] text-center px-1 py-2 rounded-md bg-gradient-to-tr from-blue-500 via-purple-600 to-indigo-400 hover:bg-gradient-to-tl hover:from-indigo-500 hover:via-purple-700 hover:to-purple-400 text-white text-[10px] font-semibold"
                                    >Made With :
                                </span>

                                <span
                                    v-for="technology in project.skills.split(
                                        ' '
                                    )"
                                    class="font-[courier-new] text-center px-1 py-2 rounded-md shadow-md uppercase p-1 text-black text-[10px] font-semibold"
                                    >{{ technology }}
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-between w-full">
                        <a
                            v-if="project.preview"
                            :href="project.preview_url"
                            target="_blank"
                            class="hover:underline"
                        >
                            <button
                                class="w-full hover py-2 px-2 rounded-md hover:opacity-90 text-black"
                            >
                                <span class="text-sm">Preview Live </span>
                                <font-awesome-icon
                                    icon="up-right-from-square"
                                    class="white ml-1"
                                />
                            </button>
                        </a>

                        <a
                            v-if="project.source"
                            :href="project.source_url"
                            target="_blank"
                            class="hover:underline"
                        >
                            <button
                                class="w-full hover py-2 px-2 rounded-md bg-s text-black hover:opacity-85"
                            >
                                <span class="text-sm">View On Github</span>
                                <font-awesome-icon
                                    :icon="['fab', 'github']"
                                    class="white ml-1"
                                />
                            </button>
                        </a>
                    </div>
                </SwiperSlide>
            </swiper>
        </div>
    </NewSection>
</template>
<style>
.swiper-button-prev {
    margin-left: -60px;
    color: rgb(181, 9, 181);
}

.swiper-button-next {
    margin-right: -60px;
    color: rgb(181, 9, 181);
}

.swiper-pagination-bullet {
    width: 15px;
    height: 15px;
    /* background-color: rgb(191, 192, 193); */
}
</style>
