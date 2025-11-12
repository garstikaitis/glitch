import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import tailwindcss from "@tailwindcss/vite";
import vue from "@vitejs/plugin-vue";
import vueDevTools from "vite-plugin-vue-devtools";
import AutoImport from "unplugin-auto-import/vite";
import Components from "unplugin-vue-components/vite";
import { PrimeVueResolver } from "@primevue/auto-import-resolver";

export default defineConfig({
    plugins: [
        vueDevTools({
            appendTo: /resources\/js\/(app|widget\/widget)\.ts$/
        }),
        AutoImport({
            imports: ["vue"],
            dts: "./auto-imports.d.ts",
            viteOptimizeDeps: true,
        }),
        Components({
            dirs: [
                "./resources/js/components",
                "./resources/js/layouts",
                "./resources/js/pages",
            ],
            dts: true,
            deep: true,
            extensions: ["vue"],
            resolvers: [PrimeVueResolver()],
        }),
        laravel({
            input: ["resources/css/app.css", "resources/js/app.ts", "resources/js/widget/widget.ts"],
            refresh: true,
        }),
        vue(),
        tailwindcss(),
    ],
    build: {
        rollupOptions: {
            output: {
                manualChunks: (id) => {
                    if (id.includes('widget')) {
                        return 'widget';
                    }
                }
            }
        }
    },
});
