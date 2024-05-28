<script setup>
import axios from "axios";
import { onMounted, ref } from "vue";
import { router, usePage } from "@inertiajs/vue3";

const languages = ref("");
const page = usePage();
onMounted(() => {
    axios
        .get(route("GetLanguage"))
        .then((response) => {
            languages.value = response.data;
        })
        .catch((error) => {
            console.log(error);
        });
});

function deleteLanguage(id) {
    router.delete(route("language.destroy", id));
}
</script>

<template>
    <div class="bg-white rounded-xl p-5">
        <h4
            v-motion-pop-visible
            class="text-[1.3rem] font-medium mb-5 transition-all duration-500 ease-in-out"
        >
            Languages I speak
        </h4>
        <ul>
            <li
                v-motion-pop-visible
                v-for="language in languages"
                :key="language.id"
                class="group text-xl transition-all duration-300 ease-in-out text-gray-700 p-5 flex items-center gap-5"
            >
                <img
                    :src="`../storage/${language.image}`"
                    class="rounded-full w-10"
                    alt=""
                />
                {{ language.name }}
                <div
                    v-if="page.props.auth.user"
                    class="group-hover:flex gap-4 p-2 flex items-center transition-all duration-300 ease-in-out border- border-red-400"
                >
                    <font-awesome-icon
                        @click="deleteLanguage(language.id)"
                        v-motion-pop-visible
                        icon="remove"
                        class="text-red-400 cursor-pointer"
                    />
                </div>
            </li>
        </ul>
    </div>
</template>
