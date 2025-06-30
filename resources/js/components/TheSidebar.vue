<template>
    <div class="fixed left-0 top-0 h-full bg-surface-0 border-r border-surface-200 z-40 sidebar-transition w-64">
        <div class="px-4 border-b border-surface-200 h-20 flex">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 bg-primary rounded-lg flex items-center justify-center">
                        <i class="pi pi-bolt text-primary-contrast text-sm"></i>
                    </div>
                    <span class="font-semibold text-surface-900">PrimeApp</span>
                </div>
            </div>
        </div>

        <nav class="p-2 flex-1">
            <ul class="flex flex-col gap-1">
                <li v-for="item in menuItems" :key="item.id">
                    <a
                        href="#"
                        class="flex items-center px-3 py-2 border-round cursor-pointer transition-all duration-150 text-surface-700 hover:bg-surface-100"
                    >
                        <i :class="['text-base', item.icon]"></i>
                        <span class="ml-3 font-medium">{{ item.label }}</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</template>

<script setup lang="ts">
import {ref} from "vue";
const sidebarOpen = ref(true);
const menuItems = ref([ { id: 'dashboard', label: 'Dashboard', icon: 'pi pi-home' } ]);

</script>

<style scoped>

</style>
