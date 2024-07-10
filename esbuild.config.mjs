import * as esbuild from "esbuild";

function isProd() {
  return process.env.NODE_ENV === "production";
}

const config = {
  entryPoints: ["main.js"],
  bundle: true,
  format: "esm",
  platform: "browser",
  splitting: true,
  sourcemap: true,
  outdir: "dist",
  minify: isProd(),
  bundle: true,
  // TODO: This line breaks the bundle. It seems old browsers don't support dynamic imports.
  // target: ["chrome58", "firefox57", "safari11", "edge16"],
};

if (isProd()) {
  await esbuild.build(config);
} else {
  (await esbuild.context(config)).watch();
}
