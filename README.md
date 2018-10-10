# Laravel Frontend Preset using VueJS

What it includes:

- SASS (SCSS) compilation
- [Tailwind CSS](https://tailwindcss.com)
- [PurgeCSS](https://www.purgecss.com/), via [spatie/laravel-mix-purgecss](https://github.com/spatie/laravel-mix-purgecss)
- [VueJS](https://vuejs.org/)
- Extracts Vue and Axios to a `vendor.js` file
- File versioning
- Removes Bootstrap and jQuery
- Adds custom `.gitignore`
- Adds some basic views with a layout file

## Installation

Install via Composer:

```
composer require codezero/laravel-preset-vue --dev
```

Apply the scaffolding by running:

```
php artisan preset codezero-vue
```

All done!
