<template>
    <AuthenticatedLayout>
        <div class="flex flex-wrap gap-4 shrink-0">
        <WidgetCard v-for="widget in props.widgets.data" :key="widget.id" :widget="widget" />
        <EmptyWidgetCard  />
        </div>
    </AuthenticatedLayout>
</template>


<script setup lang="ts">
import AuthenticatedLayout from "@/layouts/AuthenticatedLayout.vue";

interface Props {
    widgets: Widget[]
}
const props = defineProps<Props>();
</script>


<style scoped>

</style>
