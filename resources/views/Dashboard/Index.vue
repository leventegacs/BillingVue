<script setup>

import AppLayout from "../Layouts/AppLayout.vue";
</script>
<template>
    <AppLayout title="Dashboard">
        <div class="flex gap-5 justify-between pt-7 lg:pt-lg px-9 lg:px-lg items-center mb-8">
            <div class="flex items-center flex-wrap sm:gap-y-5">
                <h1 class="text-vue-dark text-2xl font-semibold mr-4">Vezérlőpult</h1>
            </div>
            <div>
                <PrimaryButton label="Új bevételezés"/>
            </div>
        </div>
        <div class="grid grid-cols-8 px-9 gap-5">
            <Card class="col-span-full">
                <template #header>
                    Ez egy táblázat
                </template>

                Teszt

                <template #footer class="text-right">
                    <PrimaryButton label="Bevételezés rögzítése"/>
                </template>
            </Card>
        </div>
    </AppLayout>
</template>
