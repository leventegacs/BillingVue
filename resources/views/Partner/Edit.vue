<script setup lang="ts">

import FormSection from "../Components/FormSection.vue";

const props = defineProps({
    partner: Object
})

const form = useForm({
    name: props.partner.data.name,
    tax_number: props.partner.data.tax_number,
    postal_code: props.partner.data.postal_code,
    city: props.partner.data.city,
    street: props.partner.data.street,
    house_number: props.partner.data.house_number
})

const update = () => {
    form.put(route('admin.partners.update', props.partner.data.id))
}

const updateCity = async () => {
    const response = await fetch(`https://hur.webmania.cc/zips/${form.postal_code}.json`);
    const city = await response.json();

    if (city.zips.length === 0) {
        form.city = ''
        return;
    }

    form.city = city.zips[0].name
}

</script>

<template>
    <AppLayout title="Új partner">
        <div class="flex gap-5 justify-between items-center">
            <div class="flex items-center flex-wrap sm:gap-y-5">
                <h1 class="text-primary-dark text-2xl font-semibold mr-4">Partner módosítás</h1>
            </div>
        </div>
        <FormSection :submit="update">
            <template #body>
                <InputGroup class="sm:col-span-3" field="name" label="Név" :error="form.errors.name" required="true">
                    <InputText v-model="form.name" placeholder="Add meg a partner nevét"/>
                </InputGroup>

                <InputGroup class="sm:col-span-3" field="tax_number" label="Adószám" :error="form.errors.tax_number"
                            required="true">
                    <InputText v-model="form.tax_number" placeholder="Add meg a partner adószámát"/>
                </InputGroup>

                <InputGroup class="sm:col-span-3" field="postal_code" label="Irányítószám"
                            :error="form.errors.postal_code" required="true">
                    <InputText v-model="form.postal_code" @change="updateCity" placeholder="Add meg az irányítószámát"/>
                </InputGroup>

                <InputGroup class="sm:col-span-3" field="city" label="Város" :error="form.errors.city" required="true">
                    <InputText v-model="form.city" placeholder="Add meg a várost"/>
                </InputGroup>

                <InputGroup class="sm:col-span-3" field="street" label="Utca" :error="form.errors.street"
                            required="true">
                    <InputText v-model="form.street" placeholder="Add meg az utcát"/>
                </InputGroup>

                <InputGroup class="sm:col-span-3" field="house_number" label="Házszám" :error="form.errors.house_number"
                            required="true">
                    <InputText v-model="form.house_number" placeholder="Add meg az utcát"/>
                </InputGroup>
            </template>
            <template #footer>
                <PrimaryButton label="Módosítás" :disabled="form.processing"/>
            </template>
        </FormSection>
    </AppLayout>
</template>
