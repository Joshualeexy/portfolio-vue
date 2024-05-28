<script setup>
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import Heading from "@/Components/Heading.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import TextInput from "@/Components/GradientInput.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";

defineProps({

    status: {
        type: String,
    },
});

const form = useForm({
    email: "",
    password: "",
});

const submit = () => {
    form.post(route("login"), {
        onFinish: () => form.reset("password"),
    });
};
</script>

<template>
    <div class="flex w-full min-h-full h-screen flex-1 flex-col justify-center items-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto w-full sm:max-w-sm grid place-items-center gap-5 text-center">
            <Link :href="'/'">
            <ApplicationLogo class="w-20" />
            </Link>
            <Heading title="Sign In To As Admin" class="text-center" />
        </div>

        <div class="sm:mx-auto w-full sm:max-w-sm">
            <form class="space-y-6 w-full" @submit.prevent="submit" method="POST">
                <div>
                    <div class="w-full">
                        <InputLabel label="Enter Email" class="" />
                        <TextInput v-model="form.email" class="!py-2" inputType="email"/>
                        <InputError v-if="form.errors.email" :label="form.errors.email" />
                    </div>
                </div>

                <div>
                    <div class="">
                        <div class="flex items-center justify-between">
                            <InputLabel label="Enter Password " class="font-" />
                            <Link href="#" class=" text-indigo-600 text-sm hover:underline">Forgot password?</Link>

                        </div>
                        <TextInput class="!py-2" v-model="form.password" inputType="password" />
                        <InputError v-if="form.errors.password" :label="form.errors.password" />
                    </div>
                </div>

                <div>
                    <PrimaryButton :disabled="form.processing" text="Login" class="w-full rounded-md" icon="sign-in" />
                </div>
            </form>
        </div>
    </div>
</template>
