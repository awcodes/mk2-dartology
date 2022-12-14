import fs from "fs";
import { homedir } from "os";
import { resolve } from "path";
import laravel from "laravel-vite-plugin";
import { defineConfig } from "vite";

let inputs = [];
const host = "mk2-dartology.test";

if (process.env.TAILWIND_CONFIG) {
    inputs = [`resources/css/${process.env.TAILWIND_CONFIG}.css`];
} else {
    inputs = ["resources/css/app.css", "resources/js/app.js"];
}

export default defineConfig({
    plugins: [
        laravel({
            input: inputs,
            refresh: true,
        }),
    ],
    server: detectServerConfig(host),
    css: {
        postcss: {
            plugins: [
                require("tailwindcss/nesting"),
                require("tailwindcss")({
                    config: process.env?.TAILWIND_CONFIG
                        ? `tailwind-${process.env.TAILWIND_CONFIG}.config.js`
                        : "./tailwind.config.js",
                }),
                require("autoprefixer"),
            ],
        },
    },
    build: {
        outDir: process.env?.TAILWIND_CONFIG
            ? `./public/build/${process.env.TAILWIND_CONFIG}`
            : "./public/build/frontend",
    },
});

function detectServerConfig(host) {
    let keyPath = resolve(homedir(), `.config/valet/Certificates/${host}.key`);
    let certificatePath = resolve(
        homedir(),
        `.config/valet/Certificates/${host}.crt`
    );

    if (!fs.existsSync(keyPath)) {
        return {};
    }

    if (!fs.existsSync(certificatePath)) {
        return {};
    }

    return {
        hmr: { host },
        host,
        https: {
            key: fs.readFileSync(keyPath),
            cert: fs.readFileSync(certificatePath),
        },
    };
}
