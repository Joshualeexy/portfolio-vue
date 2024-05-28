<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import ActionLink from "@/Components/ActionLink.vue";
import Modal from "@/Components/Modal.vue";
import ActionButton from "@/Components/ActionButton.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import GradientInput from "@/Components/GradientInput.vue";
import InputError from "@/Components/InputError.vue";
import Heading from "@/Components/Heading.vue";
import { useForm, router, Link, Head } from "@inertiajs/vue3";
import { ref, computed, onMounted } from "vue";
import GradientHeading from "@/Components/GradientHeading.vue";

const props = defineProps({
    Skill: Object,
});

const form = useForm({
    name: "",
    img: "",
    category: "",
});

onMounted(() => {
    form.name = props.Skill.name;
    form.category = props.Skill.category;
    form.img = props.Skill.img;
});

function SaveEditedSkill() {
    router.post(route("skill.update", props.Skill.id), {
        _method: "put",
        name: form.name,
        category: form.category,
        img: form.img,
        
    });
    
}
</script>

<template>
    <AuthenticatedLayout>
        <section class="h-full w-sccreen p-2">
            <Head :title="`Edit Skill ${Skill.name}`" />
            <div class="">
                <div class="bg-white w-full p-2 flex items-start justify-end">
                    <Link :href="route('admin.skills')">
                        <ActionButton
                            icon="angle-left"
                            text="Go Back"
                            class="w-32 border-purple-500 text-purple-500 hover:bg-purple-500 hover:border-purple-400 active:bg-gray-200"
                        />
                    </Link>
                </div>
                <!--  Add skill modal -->
                <div class="relative h-screen bg-white">
                    <form
                        @submit.prevent="SaveEditedSkill"
                        class="m-auto p-6 w-10/12 sm:w-full flex flex-col justify-center bg-white items-center gap-2 bg-whitw rounded-xl shadow-2xl"
                    >
                    <div class="">
                        <Heading title="Edit Skill" />
                    </div>
                    <div
                    class="w-full sm:w-6/12 flex flex-col justify-between items-center gap-1"
                    >
                    <!-- Skill category field start here  -->
                 
                            <GradientInput holder="Skill Category">
                                <select class="rounded" v-model="form.category">
                                    <option value="frontend">Frontend</option>
                                    <option value="backend">Backend</option>
                                    <option value="others">Others</option>
                                </select>
                            </GradientInput>
                            <InputError
                                :label="form.errors.category"
                                class="w-full"
                            />
                            <!-- Skill category field ends here  -->

                            <!-- Skill Name field Starts here  -->

                            <GradientInput
                                holder="Skill Name"
                                v-model="form.name"
                                class=""
                            />
                            <InputError
                                :label="form.errors.name"
                                class="w-full"
                            />
                            <!-- Skill Name field ends here  -->

                            <!-- Skill Image field starts here  -->
                            <GradientInput
                                @input="form.img = $event.target.files[0]"
                                holder="Skill Image"
                                inputType="file"
                                class="bg-white border-none p-2"
                            />
                            <progress
                                class="w-full"
                                v-if="form.progress"
                                :value="form.progress.percentage"
                                max="100"
                            ></progress>

                            <InputError
                                :label="form.errors.img"
                                class="w-full"
                            />
                            <!-- Skill Image field ends here  -->

                            <div class="flex justify-between w-full">
                                <PrimaryButton
                                    v-motion-pop-visible
                                    :disabled="Skill.processing"
                                    text="Save"
                                    icon="check"
                                    class="w-48 rounded-lg py-3 px-10"
                                />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!--  Add skill modal Ends-->
        </section>
    </AuthenticatedLayout>
</template>
