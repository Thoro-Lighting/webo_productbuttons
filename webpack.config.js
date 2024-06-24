const {CleanWebpackPlugin} = require('clean-webpack-plugin');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const path = require('path');

module.exports = {
  entry: {
    frontJs: './_dev/js/frontIndex.js',
    front: './_dev/scss/index.scss'
  },
  output: {
    filename: '[name].js',
    path: path.resolve(__dirname, './views/dist'),
  },
  module: {
    rules: [
      {
        test: /\.js$/,
        exclude: /node_modules/,
        use: ['babel-loader'],
      },
      {
        test: /\.s?css$/,
        use: [
          'style-loader',
          {
            loader: MiniCssExtractPlugin.loader,
            options: {
              esModule: false,
            },
          },
          'css-loader',
          {
            loader: 'sass-loader',
            options: {
              implementation: require('sass-embedded'),
            },
          },
        ],
      },
    ],
  },
  stats: {
    colors: true,
  },
  devtool: 'source-map',
  plugins: [
    new CleanWebpackPlugin(),
    new MiniCssExtractPlugin({
      filename: '[name].css',
    }),
  ],
};
