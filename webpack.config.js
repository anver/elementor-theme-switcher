const path = require("path");
const MiniCSSExtractPlugin = require("mini-css-extract-plugin");

module.exports = {
	entry: { bundle: "./src/index.js", style: "./src/style.scss" },
	output: {
		path: path.resolve(__dirname, "dist"),
		filename: () => "js/[name].js",
		chunkFilename: "js/[name].js",
	},
	module: {
		rules: [
			{
				test: /\.(sc|sa|c)ss$/,
				use: [
					{
						loader: MiniCSSExtractPlugin.loader,
					},
					{
						loader: "css-loader",
					},
					{
						loader: "sass-loader",
					},
				],
			},
		],
	},
	plugins: [
		new MiniCSSExtractPlugin({
			filename: "css/[name].css",
			chunkFilename: "css/[name].css",
		}),
	],
	mode: "development",
	devtool: "cheap-module-source-map",
};
