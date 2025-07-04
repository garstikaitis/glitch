
<template>
        <Card class="w-1/2 h-[400px] flex items-center justify-center">
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
