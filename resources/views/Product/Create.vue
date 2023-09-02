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
    <AppLayout title="Új termék">
        <div class="flex gap-5 justify-between items-center">
            <div class="flex items-center flex-wrap sm:gap-y-5">
                <h1 class="text-vue-dark text-2xl font-semibold mr-4">Új termék</h1>
            </div>
        </div>
        <FormSection :submit="create">
            <template #body>
                <InputGroup class="sm:col-span-full" field="name" label="Megnevezés" :error="form.errors.name" required="true">
                    <InputText v-model="form.name" placeholder="Add meg a termék nevét"/>
                </InputGroup>
                <InputGroup class="sm:col-span-3" field="identifier" label="Termékkód" :error="form.errors.identifier">
                    <InputText v-model="form.identifier" placeholder="Add meg a termékkódot" />
                </InputGroup>
                <InputGroup class="sm:col-span-3" field="net_price" label="Nettó egységár" :error="form.errors.net_price">
                    <InputText v-model="form.net_price" placeholder="Add meg az egységárat" addon="Ft"  />
                </InputGroup>
            </template>
            <template #footer>
                <PrimaryButton label="Létrehozás" :disabled="form.processing" />
            </template>
        </FormSection>
    </AppLayout>
</template>
