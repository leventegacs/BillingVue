<script setup>
</script>

<template>
    <div class="hidden lg:fixed lg:inset-y-0 lg:z-50 lg:flex lg:w-72 lg:flex-col">
        <div class="flex grow flex-col gap-y-5 overflow-y-auto bg-gray-900 px-6 pb-4">
            <div class="flex h-16 shrink-0 items-center">
                <slot name="header" />
            </div>

            <nav class="space-y-8 flex flex-col">
                <slot />
            </nav>
        </div>
    </div>
</template>
