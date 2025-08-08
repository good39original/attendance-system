import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig(({ command, mode }) => {
    const appUrl = process.env.APP_URL || 'http://localhost';

    return {
        // baseは絶対URLにする
        base: `${appUrl.replace(/\/$/, '')}/build/`,
        plugins: [
            laravel({
                input: ['resources/css/app.css', 'resources/js/app.js'],
                refresh: true,
            }),
        ],
        server: {
            https: true,
        },
    };
});
