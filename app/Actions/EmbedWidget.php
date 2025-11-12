<?php

namespace App\Actions;

use App\Models\Widget;

class EmbedWidget
{
    public function handle(Widget $widget) {
        // Get widget file from manifest
        $manifest = json_decode(
            file_get_contents(public_path('build/manifest.json')),
            true
        );

        $widgetFile = $manifest['resources/js/widget/widget.ts']['file'];
        $widgetPath = public_path("build/{$widgetFile}");

        // Read JS
        $js = file_get_contents($widgetPath);

        // Get CSS if it exists
        $css = '';
        if (isset($manifest['resources/js/widget/widget.ts']['css'])) {
            foreach ($manifest['resources/js/widget/widget.ts']['css'] as $cssFile) {
                $cssPath = public_path("build/{$cssFile}");
                if (file_exists($cssPath)) {
                    $cssContent = file_get_contents($cssPath);
                    $css .= $cssContent;
                }
            }
        }

        // Inject CSS into JS
        $cssJs = '';
        if ($css) {
            $cssJs = "
    (function() {
        const style = document.createElement('style');
        style.textContent = ".json_encode($css).';
        document.head.appendChild(style);
    })();
    ';
        }

        // Prepend widget config
        $config = $this->getWidgetConfig($widget);
        $configJs = 'window.glitchConfig = '.json_encode($config).";\n\n";

        return response($configJs.$cssJs.$js)
            ->header('Content-Type', 'application/javascript')
            ->header('Cache-Control', 'public, max-age=3600')
            ->header('Access-Control-Allow-Origin', '*')
            ->header('Access-Control-Allow-Methods', 'GET')
            ->header('Access-Control-Allow-Headers', 'Content-Type');
    }

    private function getWidgetConfig(Widget $widget)
    {
        // Fetch widget settings from database
        // $widget = Widget::where('uuid', $uuid)->first();

        return [
            'uuid' => $widget->uuid,
            'apiUrl' => url('/api/widgets/'.$widget->uuid),
            'position' => 'bottom-right',
            'primaryColor' => '#6366f1',
        ];
    }
}
