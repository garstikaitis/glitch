<template>
    <Card class="w-1/2">
    <template #title>{{widget.name}}</template>
    <template #subtitle>{{widget.domain}}</template>
    </Card>
</template>
<script setup lang="ts">
const props = defineProps(['widget'])
</script>

