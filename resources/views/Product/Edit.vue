<script setup lang="ts">

import FormSection from "../Components/FormSection.vue";

const props = defineProps({
    flash: Object,
    product: Object
})

const form = useForm({
    name: props.product.data.name,
    identifier: props.product.data.identifier,
    net_price: props.product.data.net_price
})

const update = () => {
    form.put(route('admin.products.update', props.product.data.id), {
        preserveScroll: true,
    })
}
</script>

<template>
    <AppLayout title="Termék módosítás">
        <div class="flex gap-5 justify-between items-center">
            <div class="flex items-center flex-wrap sm:gap-y-5">
                <h1 class="text-vue-dark text-2xl font-semibold mr-4">Termék módosítás</h1>
            </div>
        </div>
        <FormSection :submit="update">
            <template #body>
                <InputGroup class="sm:col-span-full" field="name" label="Megnevezés" :error="form.errors.name">
                    <InputText v-model="form.name" placeholder="Add meg a termék nevét" required="true" />
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
