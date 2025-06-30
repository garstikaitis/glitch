<template>
    <Layout>
        <div class="min-h-screen bg-surface-50">
            <TheSidebar />
            <TheHeader />

            <div class="ml-64">

                <main class="p-6">
                    <slot></slot>
                </main>
            </div>
        </div>
    </Layout>
</template>

<script setup lang="ts">

</script>
