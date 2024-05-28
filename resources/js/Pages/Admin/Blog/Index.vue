<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import BlogPreview from "@/Components/BlogPreview.vue";
import modal from "@/Components/Modal.vue";
import ActionButton from "@/Components/ActionButton.vue";
import ActionLink from "@/Components/ActionLink.vue";
import GradientHeading from "@/Components/GradientHeading.vue";
import { useRandomBg } from "@/Composables/useRandomBg.js";
import {ref } from "vue";
import { Head, router, usePage } from "@inertiajs/vue3";
import { useToast } from "vue-toastification";

const props = defineProps({
    Categories: Array,
    BlogPosts: Array,
});
const toast = useToast();
const page = usePage();

const { randomBg } = useRandomBg();
const posts = ref(props.BlogPosts);

const tags = ref([]);
ref(
    posts.value.forEach((post) => {
        if (tags.value.includes(post.tags)) {
        } else {
            tags.value.push(post.tags);
        }
    })
);

function filterBlogPosts(by, filtervalue) {
    router.get(route("blogpost.index"), {
        by: by,
        filtervalue: filtervalue,
    });
}

const showCategoriesModal = ref(false);
</script>
<template>
    <AuthenticatedLayout class="">
        <Head title="Blog" />
        <template #sidebar>
            <ul
                class="sidebarul fixed flex gap-4 pr-3 flex-wrap h-4/6 pb-10 w-3/12 overflow-auto scrollbar-width-20"
            >
                <GradientHeading text="Categories" class="w-full" />
                <li class="hover:opacity-75">
                    <button
                        @click="filterBlogPosts('all')"
                        v-motion-pop-visible
                        class="text-white transition-all duration-1000 px-3 bg-purple-600 py-1 rounded-lg"
                    >
                        <font-awesome-icon icon="layer-group" /> All
                    </button>
                </li>

                <li
                    v-for="category in Categories"
                    :key="category.id"
                    class="hover:opacity-75"
                >
                    <button
                        @click="filterBlogPosts(category.name, category)"
                        v-motion-pop-visible
                        class=" transition-all duration-1000 px-3 py-1 rounded-lg"
                        :class="randomBg()"
                    >
                         <font-awesome-icon icon="layer-group"  /> {{ category.name }}
                    </button>
                </li>
                <GradientHeading text="Tags" class="w-full mt-10" />
                <li
                    v-for="tag in tags.join(' ').split(' ')"
                    :key="tag"
                    class="hover:opacity-75"
                >
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

        <div class="flex w-full justify-between mb-10 sticky top-[6rem] z-40">
            <ActionLink
                :href="route('admin.blogpost.create')"
                class="text-gray-700 bg-purple-500 text-sm border-purple-400 hover:text-white"
                text="Add Post"
                @click="showCategoriesModal = !showCategoriesModal"
                icon="add"
            />
            <ActionButton
                class="md:hidden bg-purple-500 text-gray-100 text-sm border-purple-400 hover:text-white"
                text="Categories"
                @click="showCategoriesModal = !showCategoriesModal"
                icon="layer-group"
            />
        </div>
        <div class="md:hidden sticky top-16 bg-white z-30">
            <modal v-if="showCategoriesModal" class="ease-in-out">
                <ul
                    v-motion-slide-visible-top
                    class="transition-all ease-in-out pr-3 flex flex-wrap h-max pb-24 pt-8 backdrop-blur-lg"
                >
                    <GradientHeading text="Categories" class="w-full mt-10" />

                    <li class="hover:opacity-75">
                        <button
                            @click="filterBlogPosts('all')"
                            v-motion-pop-visible
                            class="text-white transition-all duration-1000 px-3 bg-purple-600 py-2 m-2 rounded-lg"
                        >
                            <font-awesome-icon icon="layer-group" /> All
                        </button>
                    </li>
                    <li
                        v-for="category in Categories"
                        :key="category.id"
                        class="inline hover:opacity-75"
                    >
                        <button
                            @click="filterBlogPosts(category.name, category)"
                            v-motion-pop-visible
                            class="transition-all duration-700 px-3 py-2 m-2 rounded-lg"
                            :class="randomBg()"
                        >
                            {{ category.name }}
                        </button>
                    </li>

                    <GradientHeading text="Tags" class="w-full mt-10" />
                    <li
                        v-for="tag in tags.join(' ').split(' ')"
                        :key="tag"
                        class="inline"
                    >
                        <button
                            v-motion-pop-visible
                            class="transition-all duration-1000 px-3 py-1 m-2 rounded-lg"
                            :class="randomBg()"
                        >
                            #{{ tag }}
                        </button>
                    </li>
                </ul>
            </modal>
        </div>
        <BlogPreview :BlogPosts="posts" />
    </AuthenticatedLayout>
</template>
<style scoped>
::-webkit-scrollbar-button {
    height: 2px;
}
</style>
