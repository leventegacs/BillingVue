<script setup>
import {Link} from '@inertiajs/vue3'

defineProps({
    href: String,
    active: Boolean
})
</script>

<template>
    <li>
        <Link
            :href="href"
            class="text-gray-400 hover:text-white hover:bg-gray-800 group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold"
            :class="{ 'bg-gray-800 text-white group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold' : active }"
        >
            <span v-if="$slots.icon">
                <slot name="icon"/>
            </span>

            <slot/>
        </Link>
    </li>
</template>
