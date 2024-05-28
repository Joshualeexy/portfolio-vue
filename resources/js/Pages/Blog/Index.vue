<script setup>
import BlogLayout from "@/Layouts/BlogLayout.vue";
import BlogPreview from "@/Components/BlogPreview.vue";
import modal from "@/Components/Modal.vue";
import GradientHeading from "@/Components/GradientHeading.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { useRandomBg } from "@/Composables/useRandomBg";
import { ref } from "vue";
import { Head, router } from "@inertiajs/vue3";

const props = defineProps({
    Categories: Array,
    BlogPosts: Array,
});
const { randomBg } = useRandomBg();

const category = ref("all");
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
    <BlogLayout class="">
        <Head title="Blog |" />
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
                        class="transition-all duration-1000 px-3 py-1 rounded-lg"
                        :class="randomBg()"
                    >
                        {{ category.name }}
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

        <div
            class="flex w-full justify-end md:hidden mb-10 sticky top-[4.7rem] z-40"
        >
            <PrimaryButton
                class="text-purple-500"
                text="Categories"
                @click="showCategoriesModal = !showCategoriesModal"
                icon="layer-group"
            />
        </div>
        <div class="md:hidden sticky top-16 bg-white z-30">
            <modal v-if="showCategoriesModal" class="ease-in-out">
                <ul
                    v-motion-slide-visible-top
                    class="transition-all flex ease-in-out pr-3 flex-wrap h-max pb-24 pt-8 backdrop-blur-lg"
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
                        class="inline"
                    >
                        <button
                            @click="sortPosts(category.name)"
                            v-motion-pop-visible
                            class="transition-all duration-1000 px-3 py-2 m-2 rounded-lg"
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
    </BlogLayout>
</template>
<style scoped>
::-webkit-scrollbar-button {
    height: 2px;
}
</style>
