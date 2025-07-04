<template>
    <header class="bg-surface-0 px-6 ml-64 h-20 flex items-center">
        <div class="flex items-center justify-between w-full">
            <div class="flex items-center gap-4 items-center">
                <h1 class="text-2xl font-semibold text-surface-900 capitalize">{{page.component}}</h1>
            </div>

            <div class="flex items-center gap-4">
                <!-- Search -->
                <IconField>
                    <InputIcon class="pi pi-search" />
                    <InputText v-model="searchQuery" placeholder="Search..." />
                </IconField>

                <Menu :model="menuItems" ref="menu" :popup="true" />
                <Button
                    text
                    @click="handleMenu"
                    class="flex items-center gap-2"
                >
                    <Avatar
                        image="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=32&h=32&fit=crop&crop=face"
                        shape="circle"
                        size="normal"
                    />
                    <i class="pi pi-chevron-down text-xs"></i>
                </Button>
            </div>
        </div>
    </header>
</template>

<script setup lang="ts">
import {ref} from "vue";
import {usePage, router} from "@inertiajs/vue3";
const menu = ref();
const page = usePage();

const searchQuery = ref('');
const menuItems = ref([ { id: 'logout', label: 'Logout', icon: 'pi pi-power-off', command: logout } ]);
function handleMenu(event: Event) {
    menu.value.toggle(event)
}
function logout() {
    router.delete('/current-session');
}
</script>



<style scoped>

</style>
