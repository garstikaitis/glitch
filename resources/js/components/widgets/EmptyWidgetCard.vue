
<template>
        <Card class="flex items-center justify-center min-h-[200px]">
            <template #content>
                    <RouterLink href="/widgets/create">
                        <Button @click="goToCreate" size="small" variant="outlined">
                                Create new widget <i class="pi pi-plus"></i>
                        </Button>
                    </RouterLink>
            </template>
        </Card>
</template>
<script setup lang="ts">
import {router} from "@inertiajs/vue3";

function goToCreate() {
    router.push('/create')
}
</script>


<style scoped>

</style>
