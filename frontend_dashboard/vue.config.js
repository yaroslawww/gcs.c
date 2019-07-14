module.exports = {
  // proxy API requests to Valet during development
  devServer: {
    proxy: process.env.VUE_APP_DEV_PROXY,
  },

  baseUrl: '/dashboard_assets/',
  // output built static files to Laravel's public dir.
  // note the "build" script in package.json needs to be modified as well.
  outputDir: '../public/dashboard_assets',

  // modify the location of the generated HTML file.
  // make sure to do this only in production.
  indexPath: process.env.NODE_ENV === 'production'
    ? '../../resources/views/dashboard/generated.blade.php'
    : 'index.html',
}
