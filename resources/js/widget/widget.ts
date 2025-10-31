import { createApp } from 'vue';
import WidgetApp from './components/WidgetApp.vue';

const widget = document.createElement('div');
widget.id = 'glitch-widget'
document.body.appendChild(widget)
createApp(WidgetApp).mount("#glitch-widget")

