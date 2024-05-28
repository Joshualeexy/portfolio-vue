<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import Heading from "@/Components/Heading.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import GradientInput from "@/Components/GradientInput.vue";
import { useToast } from "vue-toastification";
import InputError from "@/Components/InputError.vue";
import { usePage } from "@inertiajs/vue3";
import { useForm, Head } from "@inertiajs/vue3";
const props = defineProps({
    Categories: Array,
    blogpost: Array,
});
const toast = useToast();
const page = usePage();
function SaveEditedPost() {
    form.post(route("admin.blogpost.update", props.blogpost.id), {
        tags: form.tags,
        category: form.category,
        category_other: form.category_other,
        content: form.content,
        title: form.title,
        save_category_others: form.save_category_others,
        image: form.image,
        share: form.share,

        onSuccess: () => {
            toast.success(page.props.success.message);
        },
    });
}

const form = useForm({
    category: props.blogpost.category,
    category_other: "",
    title: props.blogpost.title,
    content: props.blogpost.content,
    image: props.blogpost.image,
    save_category_others: true,
    tags: props.blogpost.tags,
    share: props.blogpost.share,
});
</script>
<template>
    <Head title="Add New Post " />

    <AuthenticatedLayout>
        <div class="flex items-center flex-col mb-10">
            <form
                @submit.prevent="SaveEditedPost"
                method="post"
                class="m-auto p-6 w-full flex flex-col justify-center bg-white items-center gap-2 bg-whitw rounded-xl shadow-2xl"
            >
                <div class="">
                    <Heading title="Add New post" />
                </div>
                <div
                    class="w-full flex flex-col justify-between items-center gap-1"
                >
                    <!-- post Category field Starts here  -->
                    <div class="flex justify-between gap-4 w-full">
                        <div class="w-6/12">
                            <GradientInput holder="post Category" class="">
                                <select
                                    v-model="form.category"
                                    class="rounded-md"
                                >
                                    <option
                                        v-for="category in Categories"
                                        class="capitalize"
                                        :key="category.id"
                                        :value="category.name"
                                    >
                                        {{ category.name }}
                                    </option>
                                </select>
                            </GradientInput>
                            <InputError
                                :label="form.errors.category"
                                class="w-full"
                            />

                            <GradientInput
                                :parentdirection="'flex-row'"
                                v-if="form.category.toLowerCase() === 'other'"
                                v-model="form.category_other"
                                class="flex gap-2"
                            >
                                <input
                                    placeholder="Enter it here"
                                    class="border-none rounded-md rounded-r-none w-full"
                                    v-model="form.category_other"
                                />

                                <label
                                    for="save_category_others"
                                    class="flex flex-col items-center"
                                >
                                    <span
                                        class="text-[12px] -mb-2 text-gray-800 font-light"
                                        >save</span
                                    >
                                    <input
                                        id="save_category_others"
                                        type="checkbox"
                                        class="w-6 h-6 rounded-full m-2 border-none ring-0 focus:ring-0"
                                        v-model="form.save_category_others"
                                    />
                                </label>
                            </GradientInput>
                            <InputError
                                :label="form.errors.category"
                                class="w-full"
                            />

                            <InputError
                                :label="form.errors.category"
                                class="w-full"
                            />
                        </div>
                        <!-- post categoory field ends here  -->
                        <!-- post tags field starts here  -->

                        <div class="w-6/12">
                            <GradientInput
                                holder="Post Tags"
                                v-model="form.tags"
                                class=""
                            >
                            </GradientInput>
                            <InputError
                                :label="form.errors.tags"
                                class="w-full"
                            />

                            <small class="w-full px-3 text-orange-400"
                                >Enter tags seperated by space</small
                            >
                        </div>
                        <!-- post tags field ends here  -->
                    </div>
                    <!-- post Title field Starts here  -->
                    <div class="w-full">
                        <GradientInput
                            holder="Post Title"
                            v-model="form.title"
                            class=""
                        />

                        <InputError :label="form.errors.title" class="w-full" />
                    </div>
                    <div class="w-full">
                        <!-- post title field ends here  -->
                        <!-- post content field starts here  -->
                        <GradientInput holder="Post Content">
                            <textarea
                                v-model="form.content"
                                placeholder="Post Content Goes Here....."
                                rows="12"
                                class="rounded-md border-none py-1.5 placeholder:text-gray-300"
                            ></textarea>
                        </GradientInput>
                        <InputError
                            :label="form.errors.content"
                            class="w-full"
                        />
                    </div>
                    <!-- post content field ends here  -->

                    <!-- post Image field starts here  -->
                    <GradientInput
                        @input="form.image = $event.target.files[0]"
                        holder="post Image"
                        inputType="file"
                        class="bg-white border-none p-2"
                    />
                    <progress
                        class="w-full"
                        v-if="form.progress"
                        :value="form.progress.percentage"
                        max="100"
                    ></progress>

                    <InputError :label="form.errors.image" class="w-full" />
                    <!-- post Image field ends here  -->

                    <div class="flex justify-between w-full">
                        <PrimaryButton
                            v-motion-pop-visible
                            :disabled="form.processing"
                            text="Save Post"
                            class="rounded-lg py-3 px-20"
                        />
                    </div>
                </div>
            </form>
        </div>
    </AuthenticatedLayout>
</template>
