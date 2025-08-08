import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig(({ command, mode }) => {
    // 環境変数からAPP_URLを取得（Viteはprocess.envに.envの値を展開している想定）
    const appUrl = process.env.APP_URL || 'http://localhost';

    return {
        base: `/build/`, 
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
