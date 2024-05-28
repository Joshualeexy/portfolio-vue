<script setup>
import BlogLayout from "@/Layouts/BlogLayout.vue";
import GradientHeading from "@/Components/GradientHeading.vue";
import NewsLetter from "@/Components/NewsLetter.vue";
import { useRandomBg } from "@/Composables/useRandomBg";
import { ref } from "vue";
import { Head } from "@inertiajs/vue3";
const props = defineProps({
    BlogPost: "",
});

const { randomBg } = useRandomBg();

const showCategoriesModal = ref(false);
</script>
<template>
    <BlogLayout class="">
        <Head :title="props.BlogPost.title" />
        <template #sidebar>
            <ul
                class="sidebarul fixed flex gap-4 justify-center pr-3 flex-wrap h-4/6 pb-10 w-3/12 overflow-auto scrollbar-width-20"
            >
                <GradientHeading text="Category" class="w-full" />

                <li class="">
                    <button
                        v-motion-pop-visible
                        class="transition-all duration-1000 px-3 py-1 rounded-lg"
                        :class="randomBg()"
                    >
                        <font-awesome-icon icon="layer-group" />
                        {{ BlogPost.category }}
                    </button>
                </li>
                <GradientHeading text="Tags" class="w-full mt-10" />
                <li class="" v-for="tag in BlogPost.tags.split(' ')">
                    <button
                        v-motion-pop-visible
                        class="transition-all duration-1000 px-3 py-1 rounded-lg"
                        :class="randomBg()"
                    >
                        #{{ tag }}
                    </button>
                </li>
            </ul>
        </template>

        <div class="px-">
            <GradientHeading
                :text="BlogPost.title"
                class="text-2xl sm:text-4xl"
            />

            <div
                class="font-[courier-new] py-5 grid grid-cols-1 sm:grid-cols-1 gap-5 place-items-center border-red-400 border-2s w-full"
            >
                <div class="w-full sm:w-full rounded overflow-hidden -lg">
                    <img
                        class="w-full h-48 sm:h-80 transition-all duration-500 ease-in"
                        :src="`../../storage/${BlogPost.image}`"
                        alt=""
                    />
                    <div
                        class="p-5 flex flex-col gap-3 transition-all duration-100 ease-in"
                    >
                        <div class="flex justify-between">
                            <span
                                class="py-2 text-sm font-semibold text-gray-700"
                                >{{ BlogPost.created_at }}</span
                            >
                            <span
                                class="py-2 text-sm font-semibold flex items-center text-black"
                                ><span>Posted by :</span>
                                <font-awesome-icon
                                    icon="king"
                                    class="ml-4 mr-1"
                                />

                                <font-awesome-icon
                                    icon="fa-solid fa-user-tie"
                                    class="mx-1 text-center text-[11px] text-black/75 bg-gray-200 p-2 rounded-full"
                                />kevwe Joshua</span
                            >
                        </div>
                        <div class="">
                            <h4
                                v-text="BlogPost.title"
                                class="font-bold text-xl mb-4 underline"
                            ></h4>

                            <p
                                class="font-light leading-8 first-letter:capitalize indent-8"
                            >
                                {{ BlogPost.content }}
                            </p>
                        </div>
                        <div class="flex gap-2 flex-wrap md:hidden">
                            <span
                                v-for="tags in BlogPost.tags.split(' ')"
                                class="bg-gray-300 rounded-full px-3 py-2 text-[13px] font-semibold text-gray-700"
                                >#{{ tags }}</span
                            >
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <NewsLetter class="mb-4" />
    </BlogLayout>
</template>
