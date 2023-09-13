<script setup lang="ts">
const emit = defineEmits(['confirmed', 'closed'])

const props = defineProps({
    open: {
        type: Boolean,
        default: false,
    }
})

const isOpen = ref(props.open)

const confirmed = () => {
    isOpen.value = false;
    emit('confirmed')
}
</script>

<template>
    <Modal v-model="isOpen" @close="emit('closed')">
        <template #trigger="{openModal}">
            <slot name="trigger" :open-modal="openModal" />
        </template>

        <template #header>
            Megerősítés
        </template>

        <p class="text-sm text-gray-500">
            Valóban le szeretnéd zárni a készlet mozgatást? <br/>
            A művelet nem visszavonható!
        </p>

        <template #footer="{closeModal}">
            <PrimaryButton
                @click="closeModal"
                label="Mégse"
                color="default"
            />
            <PrimaryButton
                @click="confirmed"
                label="Lezárás"
                color="danger"
            />
        </template>
    </Modal>
</template>
