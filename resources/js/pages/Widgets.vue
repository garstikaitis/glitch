<template>
    <AuthenticatedLayout>
        <div class="grid grid-cols-3 gap-4 shrink-0 auto-fill-grid">
            <WidgetCard v-for="widget in props.widgets.data" :key="widget.id" :widget="widget" />
            <EmptyWidgetCard :class="emptyCardSpan"  />
        </div>
    </AuthenticatedLayout>
</template>


<script setup lang="ts">
import AuthenticatedLayout from "@/layouts/AuthenticatedLayout.vue";

interface Props {
    widgets: Widget[]
}
const props = defineProps<Props>();

const emptyCardSpan = computed(() => {
    const count = props.widgets.data.length
    const remainder = count % 3

    if (remainder === 0) {
        return 'col-span-3' // Full width if complete row
    } else if (remainder === 1) {
        return 'col-span-2' // Span 2 columns if 1 card in row
    } else {
        return 'col-span-1' // Span 1 column if 2 cards in row
    }
})
</script>


<style scoped>

</style>

