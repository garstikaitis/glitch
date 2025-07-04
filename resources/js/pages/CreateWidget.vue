<template>
    <AuthenticatedLayout>
        <form class="flex flex-col gap-4 shrink-0" @submit.prevent="submit">
            <FloatLabel>
                <InputText v-model="form.name" name="name" id="name" required class="w-full" />
                <label>Name</label>
                <Message v-if="props.errors.name">{{props.errors.name}}</Message>
            </FloatLabel>
            <FloatLabel>
                <InputText v-model="form.domain" name="domain" id="domain" required class="w-full" />
                <label>Domain (without https://www.)</label>
                <Message v-if="props.errors.domain">{{props.errors.domain}}</Message>
            </FloatLabel>
            <Button type="submit" class="w-full">Create</Button>
        </form>
    </AuthenticatedLayout>
</template>

<script setup lang="ts">
import AuthenticatedLayout from "@/layouts/AuthenticatedLayout.vue";
import {router, useForm} from "@inertiajs/vue3";
interface Props {
    errors: Record<string, string>
}
const props = defineProps<Props>();
const form = reactive({
    name: "",
    domain: "",
    type: "BUG_TRACKER"
})

function submit() {
    router.post('/1/widgets', form);
}
</script>



<style scoped>

</style>
