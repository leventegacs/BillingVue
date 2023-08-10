<script setup lang="ts">

import FormSection from "../Components/FormSection.vue";

const form = useForm({
    name: null,
    identifier: null,
    net_price: null,
})

const create = () => {
    form.post(route('admin.products.store'))
}
</script>

<template>
    <AppLayout title="Termék létrehozás">
        <div class="flex gap-5 justify-between items-center mb-8">
            <div class="flex items-center flex-wrap sm:gap-y-5">
                <h1 class="text-vue-dark text-2xl font-semibold mr-4">Termék létrehozás</h1>
            </div>
        </div>
        <FormSection :submit="create">
            <template #body>
                <InputGroup class="sm:col-span-full" field="name" label="Megnevezés">
                    <InputText :field="form.name" placeholder="Add meg a termék nevét" required="true" />
                </InputGroup>
                <InputGroup class="sm:col-span-3" field="identifier" label="Termékkód">
                    <InputText :field="form.identifier" placeholder="Add meg a termékkódot" />
                </InputGroup>
                <InputGroup class="sm:col-span-3" field="net_price" label="Nettó egységár">
                    <InputText :field="form.net_price" placeholder="Add meg az egységárat" addon="Ft"  />
                </InputGroup>
            </template>
            <template #footer>
                <PrimaryButton label="Létrehozás" />
            </template>
        </FormSection>
    </AppLayout>
</template>
