<script setup>
import TextInput from "./TextInput.vue";
import PrimaryButton from "./PrimaryButton.vue";
import { useForm } from "@inertiajs/vue3";
import { useToast } from "vue-toastification";
import { ref } from "vue";
import axios from "axios";

const toast = useToast();
const ActionIcon = ref("bell");
const form = useForm({
    email: "",
});

function Handleform() {
    axios
        .post(route("keep-updated"), {
            email: form.email,
        })
        .then((response) => {
            console.log(response.data)
            ActionIcon.value = "check";
            toast.success(response.data.success);
            setTimeout(() => {
                ActionIcon.value = "bell";
            }, 3000);
        }).catch((errors)=>{
            console.log(errors.response.data.message)
            toast.error(errors.response.data.message);

        });
    form.email = "";
}
</script>

<template>
    <div
        v-motion-pop-visible
        class="transition-all duration-300 ease-in rounded-2xl text-white bg-gradient-to-tr from-purple-700 via-indigo-500 to-purple-900 flex flex-col items-center sm:py-6 py-4"
    >
        <div
            v-motion-pop-visible
            class="mb-2 transition-all duration-500 ease-in"
        >
            <h2
                class="mb-2 text-gray-100 text-2xl sm:text-3xl w-full font-bold uppercase text-center"
            >
                Keep Updated
            </h2>
            <p class="text-center px-4 sm:px-16 md:px-32 font-[courier-new] ">
                Keep pace with advancements! Join our mailing list
                for selective, noteworthy updates.
            </p>
        </div>
        <div class="w-full">
            <form
                @submit.prevent="Handleform"
                v-motion-pop-visible
                class="transition-all duration-300 ease-in-out w-full sm:px-10 flex gap-1 sm:gap-2 justify-between p-4"
            >
                <TextInput
                    v-model="form.email"
                    placeholder="Enter Your Email"
                    class="w-full sm:w-full rounded-md bg-gray-100/50 placeholder-white"
                    type="email"
                    required
                />
                <PrimaryButton
                    v-motion-pop-visible
                    @click="Handleform"
                    type="button"
                    :icon="ActionIcon"
                    class="rounded-md bg-white text-sm transition-all duration-700"
                />
            </form>
        </div>
    </div>
</template>
