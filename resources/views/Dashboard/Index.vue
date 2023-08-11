<script setup>

import AppLayout from "../Layouts/AppLayout.vue";
</script>
<template>
    <AppLayout title="Dashboard">
        <div class="flex gap-5 justify-between items-center">
            <div class="flex items-center flex-wrap sm:gap-y-5">
                <h1 class="text-vue-dark text-2xl font-semibold mr-4">Termék módosítás</h1>
            </div>
        </div>
        <Card class="col-span-full">
            <template #header>
                Ez egy táblázat
            </template>

            Teszt

            <template #footer class="text-right">
                <PrimaryButton label="Bevételezés rögzítése"/>
            </template>
        </Card>
    </AppLayout>
</template>
