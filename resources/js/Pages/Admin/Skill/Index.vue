<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import ActionLink from "@/Components/ActionLink.vue";
import Modal from "@/Components/Modal.vue";
import ActionButton from "@/Components/ActionButton.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import GradientInput from "@/Components/GradientInput.vue";
import { useToast } from "vue-toastification";
import InputError from "@/Components/InputError.vue";
import Heading from "@/Components/Heading.vue";
import { router, usePage } from "@inertiajs/vue3";
import { useForm, Head } from "@inertiajs/vue3";
import { ref, computed } from "vue";
import GradientHeading from "@/Components/GradientHeading.vue";
import SkillList from "@/Components/SkillList.vue";
import TabNav from "@/Components/TabNav.vue";

const props = defineProps({
    Skills: Object,
});

const toast = useToast();
const form = useForm({
    name: "",
    category: "frontend",
    img: "",
});
function SaveSkill() {
    form.post(route("skill.store"), {
        preserveScroll: true,
        onSuccess: () => {
            form.reset();
                toast.success(page.props.success.message);

        },
    });
}
const page = usePage();


const ShowAddSkill = ref(false);
const TabNavList = ["Frontend", "Backend", "Others"];
const activeTab = ref("Frontend");
function setActiveTab(i) {
    activeTab.value = i;
}
const skills = computed(() => {
    return props.Skills.filter(
        (arr) => arr.category.toLowerCase() == activeTab.value.toLowerCase()
    );
});

function DeleteSkill(id) {
    router.delete(route("skill.destroy", id));
    toast.success(page.props.success.message);

}

if (page.props.success.message) {
    toast.success(page.props.success.message);
}

</script>

<template>

    <AuthenticatedLayout>
        <section class="h-full w-sccreen p-2">
            <Head title="Skills" />
            <div class="">
                <div class="bg-white w-full p-2 flex items-start justify-end">
                    <ActionButton
                        @click="ShowAddSkill = !ShowAddSkill"
                        icon="medal"
                        text="Add Skill"
                        class="w-48 border-purple-500 text-purple-500 hover:bg-purple-500 hover:border-purple-400 active:bg-gray-200"
                    />
                </div>
                <!--  Add skill modal -->
                <div class="relative">
                    <Modal v-if="ShowAddSkill" class="">
                        <form
                            @submit.prevent="SaveSkill"
                            method="post"
                            class="m-auto p-6 w-10/12 sm:w-6/12 flex flex-col justify-center bg-white items-center gap-2 bg-whitw rounded-xl shadow-2xl"
                        >
                            <div class="">
                                <Heading title="Add New Skill" />
                            </div>
                            <div
                                class="w-full flex flex-col justify-between items-center gap-1"
                            >
                                <!-- Skill category field start here  -->
                                <GradientInput holder="Skill Category">
                                    <select
                                        class="rounded"
                                        v-model="form.category"
                                    >
                                        <option value="frontend">
                                            Frontend
                                        </option>
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
                                    <ActionButton
                                        @click="ShowAddSkill = false"
                                        icon="close"
                                        text="Close "
                                        class="rounded-lg w-24 !border-2 border-red-500 text-red-500 hover:bg-red-500 active:bg-gray-200"
                                        :disabled="form.processing"
                                    />
                                    <PrimaryButton
                                        v-motion-pop-visible
                                        :disabled="form.processing"
                                        text="Save"
                                        icon="check"
                                        class="w-48 rounded-lg py-3 px-10"
                                    />
                                </div>
                            </div>
                        </form>
                    </Modal>
                </div>
                <!--  Add skill modal Ends-->
            </div>
            <!--  skill table list -->
            <div class="flex flex-col justify-center items-center p-0">
                <GradientHeading text="SKILLS" v-motion-pop-visible />
                <!--Tabs navigation-->
                <TabNav
                    :TabNavList="TabNavList"
                    :selected="activeTab"
                    @makeActive="setActiveTab"
                />

                <SkillList :Skills="skills" @deleteskill="DeleteSkill" />
            </div>
        </section>
    </AuthenticatedLayout>
</template>
