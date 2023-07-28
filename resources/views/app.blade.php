<!DOCTYPE html>
<html class="h-full bg-white" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        @vite(['resources/scripts/app.ts', 'resources/css/app.css', "resources/views/{$page['component']}.vue"])
        @inertiaHead
    </head>
    <body class="h-full">
        @inertia
    </body>
</html>
