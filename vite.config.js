import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    base: '/build/',  // ビルド後の資産パスのベースURLを指定（public/buildに対応）
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    server: {
        https: true,  // 開発サーバー起動時にHTTPSを有効化（devモード用）
    },
});
