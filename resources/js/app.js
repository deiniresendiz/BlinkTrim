import './bootstrap';

import Alpine from 'alpinejs';
import 'preline'
import ClipboardJS from 'clipboard';

new ClipboardJS('.copy');
window.Alpine = Alpine;

Alpine.start();
