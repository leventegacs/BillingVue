<script setup>
</script>
<template>
    <AppLayout title="Bevételezés">
        <div class="flex gap-5 justify-between items-center mb-8">
            <div class="flex items-center flex-wrap sm:gap-y-5">
                <h1 class="text-vue-dark text-2xl font-semibold mr-4">Bevételezés</h1>
            </div>
            <div>
                <PrimaryButton label="Új bevételezés"/>
            </div>
        </div>
        <div class="grid grid-cols-8 px-9 gap-5">
            <Table />
        </div>
    </AppLayout>
</template>
