<script setup lang="ts">
    defineProps({
        stock: Number
    })
</script>

<template>
    <Table>
        <template #head>
            <Column>Raktár</Column>
            <Column align="right">Mennyiség</Column>
        </template>
        <template #body>
            <Row>
                <Cell>Fő raktár</Cell>
                <Cell align="right">{{ stock }} darab</Cell>
            </Row>
        </template>
    </Table>
</template>
