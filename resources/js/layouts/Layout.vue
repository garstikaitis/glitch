<template>
    <Toast />
    <slot />
</template>

<script setup lang="ts">
import { useToast } from "primevue/usetoast";
import { usePage } from "@inertiajs/vue3";
const page = usePage();
const toast = useToast();
const errors = computed(() => page.props.errors?.serverErrors || {});
watch(errors, (value) => {
    for (let key in value) {
        toast.add({
            severity: "error",
            summary: "Error occurred",
            detail: value[key],
        });
    }
});
</script>

<style scoped></style>
