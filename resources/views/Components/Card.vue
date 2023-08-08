<script setup lang="ts">

</script>

<template>
    <div class="bg-vue-light text-vue-dark border-2 p-4 rounded-lg space-y-8">
        <div class="font-bold text-lg" v-if="$slots.header">
            <slot name="header"/>
        </div>
        <div>
            <slot />
        </div>
        <div class="flex justify-end space-x-4" v-if="$slots.footer">
            <slot name="footer" />
        </div>
    </div>
</template>
