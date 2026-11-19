import { defineConfig } from 'vite'
import tailwindcss from '@tailwindcss/vite';
import laravel from 'laravel-vite-plugin'
import { wordpressPlugin, wordpressThemeJson } from '@roots/vite-plugin';

// Charge le .env dans process.env (ignoré si le fichier n'existe pas)
try { process.loadEnvFile('.env'); } catch {}

// URL du site pour Laravel Vite plugin : .env > DDEV (défini dans le conteneur web) > valeur par défaut
const ddevUrl = process.env.DDEV_PRIMARY_URL;
process.env.APP_URL ??= ddevUrl ?? 'http://example.test';

// Port du serveur de dev (doit correspondre à web_extra_exposed_ports dans .ddev/config.yaml)
const vitePort = 5173;

export default defineConfig({
  base: '/wp-content/themes/ot-chatillonnais-theme/public/build/',
  plugins: [
    tailwindcss(),
    laravel({
      input: [
        'resources/css/app.css',
        'resources/js/app.js',
        'resources/css/editor.css',
        'resources/js/editor.js',
      ],
      refresh: true,
      assets: ['resources/images/**', 'resources/fonts/**'],
    }),

    wordpressPlugin(),

    // Generate the theme.json file in the public/build/assets directory
    // based on the Tailwind config and the theme.json file from base theme folder
    wordpressThemeJson({
      disableTailwindColors: false,
      disableTailwindFonts: false,
      disableTailwindFontSizes: false,
      disableTailwindBorderRadius: false,
    }),
  ],
  resolve: {
    alias: {
      '@scripts': '/resources/js',
      '@styles': '/resources/css',
      '@fonts': '/resources/fonts',
      '@images': '/resources/images',
    },
  },
  // Sous DDEV : écoute hors du conteneur et expose le serveur via le routeur DDEV
  server: ddevUrl ? {
    host: '0.0.0.0',
    port: vitePort,
    strictPort: true,
    origin: `${ddevUrl}:${vitePort}`,
    cors: { origin: ddevUrl },
  } : undefined,
})
