<script setup>

import Sidebar from "../Components/Sidebar.vue";
import ItemGroup from "../Components/Sidebar/ItemGroup.vue";
import Item from "../Components/Sidebar/Item.vue";
import {BuildingOfficeIcon, ArchiveBoxArrowDownIcon, ArchiveBoxXMarkIcon, Cog6ToothIcon } from "@heroicons/vue/24/outline";
import UtilityBar from "../Components/UtilityBar.vue";

</script>

<template>
    <div>
        <sidebar>
            <template #header>
                <span class="font-mono text-xl font-bold text-vue-light">BillingWith<span class="text-vue-green">Vue</span></span>
            </template>

            <ItemGroup headers="Vezérlőpult">
               <Item :active="true">
                   <BuildingOfficeIcon class="h-6 w-6"/>
                   Vezérlőpult
               </Item>
            </ItemGroup>

            <ItemGroup headers="Készlet kezelés">
                <Item>
                    <ArchiveBoxArrowDownIcon class="h-6 w-6"/>
                    Bevételezés
                </Item>
                <Item>
                    <ArchiveBoxXMarkIcon class="h-6 w-6"/>
                    Kivételezés
                </Item>
            </ItemGroup>

            <ItemGroup headers="Rendszer">
                <Item>
                    <Cog6ToothIcon class="h-6 w-6"/>
                    Beállítások
                </Item>
            </ItemGroup>
        </sidebar>
        <div class="lg:pl-72">
            <utility-bar />

            <main class="py-10">
                <div class="px-4 sm:px-6 lg:px-8">
                    <slot/>
                </div>
            </main>
        </div>
    </div>
</template>
