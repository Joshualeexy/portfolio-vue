<script setup>
import { ref, watch } from "vue";
import Heading from "./Heading.vue";
import GradientHeading from "./GradientHeading.vue";

const props = defineProps({
    md: {
        default: 2,
    },
    lg: {
        default: 3,
    },
    amount: {
        default: 5,
    },
    BlogPosts: Array,
    showSearch: {
        default: true,
    },
});
const posts = ref(props.BlogPosts);

const searchkey = ref("");
watch(searchkey, () => {
    posts.value = props.BlogPosts.filter((post) => {
        return post.title.toLowerCase().includes(searchkey.value.toLowerCase());
    });
});
</script>
<template>
    <div class="">
        <GradientHeading
            text="My Coding Ideas & Blog"
            class="text-2xl sm:text-4xl"
        />

        <div
            v-if="showSearch"
            class="w-full md:w-6/12 flex items-center rounded text-sm shadow-lg bg-gray-200 px-3 py-1 mb-2 mt-10"
        >
            <font-awesome-icon
                icon="search"
                class="text-lg -mr-2 text-gray-500"
            />
            <input
                v-model="searchkey"
                type="text"
                placeholder="Search Posts & Ideas"
                class="focus:ring-0 bg-transparent border-0 w-full"
            />
        </div>
        <div
            class="py-5 grid grid-cols-1 sm:grid-cols-1 gap-5 place-items-center"
            :class="`md:grid-cols-${md} md:grid-cols-${lg}`"
        >
            <div
                v-motion-pop-visible
                v-for="post in posts"
                :key="post.id"
                class="sm:w-full transition-all duration-700 shadow-2xl bg-gray-100 rounded w-10/12 bg-gray-2000"
            >
                <Link
                    :href="
                        route('blogpost.show', post.title.replaceAll(' ', '-'))
                    "
                    class=""
                >
                    <img
                        v-motion-pop-visible
                        class="transition-all duration-300 ease-in h-52 sm:h-32 w-full"
                        :src="`/storage/${post.image}`"
                        :alt="post.title"
                /></Link>
                <div
                    v-motion-pop-visible
                    class="p-5 pt-0 flex flex-col gap-3 transition-all duration-100 ease-in"
                >
                    <div class="flex justify-between">
                        <span
                            class="py-2 text-[10px] font-semibold text-gray-700"
                            >{{ post.created_at }}</span
                        >
                        <span
                            class="py-2 text-[10px] font-semibold text-gray-700"
                            >{{ post.category }}</span
                        >
                    </div>
                    <div class="">
                        <Link
                            :href="
                                route(
                                    'blogpost.show',
                                    post.title.replaceAll(' ', '-')
                                )
                            "
                            class=""
                        >
                            <Heading :title="post.title" />

                            <p
                                v-if="
                                    !$page.component
                                        .toLowerCase()
                                        .includes('admin')
                                "
                                class="font-[courier-new] text-gray-700 text-base my-2 text-balance md:h-12"
                            >
                                {{ `${post.content.slice(0, 50)} .....` }}
                            </p></Link
                        >
                    </div>
                    <div
                        class="flex gap-2 flex-wrap"
                        v-if="!$page.component.toLowerCase().includes('admin')"
                    >
                        <span
                            v-for="tags in post.tags.split(' ').slice(0, 3)"
                            class="bg-gray-300 rounded-full px-3 py-2 text-[10px] font-semibold text-gray-700"
                            >#{{ tags }}</span
                        >
                    </div>
                    <div
                        class=""
                        v-if="$page.component.toLowerCase().includes('admin')"
                    >
                        <Link
                            :href="route('admin.blogpost.delete', post.id)"
                            as="button"
                            method="delete"
                        >
                            <span
                                class="bg-red-400 rounded-full px-3 py-2 text-[10px] font-semibold text-gray-800 mr-2 mb-2"
                                ><font-awesome-icon icon="trash" /> Delete</span
                            >
                        </Link>
                        <Link :href="route('admin.blogpost.edit', post.id)">
                            <span
                                class="bg-green-300 rounded-full px-3 py-2 text-[10px] font-semibold text-gray-800 mr-2 mb-2"
                                ><font-awesome-icon icon="edit" /> Edit</span
                            >
                        </Link>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
