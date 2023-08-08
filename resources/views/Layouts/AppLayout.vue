<script lang="ts" setup>
import {
    BuildingOfficeIcon,
    ArchiveBoxArrowDownIcon,
    ArchiveBoxXMarkIcon,
    Cog6ToothIcon, CubeTransparentIcon
} from "@heroicons/vue/24/outline";

const auth = useAuth()

defineProps({
    title: String
})

const logout = () => {
    router.post(route('logout'));
};
</script>

<template>
    <Head :title="title" />

    <div>
        <sidebar>
          <template #header>
              <site-logo class="text-xl text-vue-light"/>
          </template>

            <ItemGroup headers="Vezérlőpult">
                <Item :href="route('dashboard')"
                      :active="current('dashboard')"
                >
                    <BuildingOfficeIcon class="h-6 w-6"/>
                    Vezérlőpult
                </Item>
            </ItemGroup>

            <ItemGroup headers="Készlet kezelés">
                <Item :href="route('admin.inwards.index')"
                      :active="current('admin.inwards.*')">
                    <ArchiveBoxArrowDownIcon class="h-6 w-6"/>
                    Bevételezés
                </Item>
                <Item>
                    <ArchiveBoxXMarkIcon class="h-6 w-6"/>
                    Kivételezés
                </Item>
            </ItemGroup>

            <ItemGroup headers="Termék kezelő">
                <Item :href="route('admin.products.index')"
                      :active="current('admin.products.*')">
                    <ArchiveBoxArrowDownIcon class="h-6 w-6"/>
                    Termékek
                </Item>
            </ItemGroup>

            <ItemGroup headers="Rendszer">
                <Item>
                    <Cog6ToothIcon class="h-6 w-6"/>
                    Beállítások
                </Item>
            </ItemGroup>
        </sidebar>
        <main class="lg:pl-72 bg-test min-h-screen">
            <utility-bar>
                <template #start>
                    <div class="relative flex flex-1 items-center">
                        <CubeTransparentIcon class="h-10 w-10 bg-vue-green rounded-xl p-1" />
                    </div>
                </template>
                <template #end>
                    <div class="flex items-center gap-x-4 lg:gap-x-6">
                        <Menu as="div" class="relative inline-block text-left">
                            <div>
                                <MenuButton class="inline-flex w-full justify-center items-center gap-x-1.5 rounded-md px-3 py-2 text-sm font-semibold text-gray-900 ring-gray-300">
                                    <img alt="profile" src="https://i.pravatar.cc/40" class="rounded-3xl">

                                    <div class="flex flex-col text-left">
                                        {{ auth.name }}
                                        <span class="text-xs text-gray-500">Adminisztrátor</span>
                                    </div>
                                </MenuButton>
                            </div>
                            <transition enter-active-class="transition ease-out duration-100" enter-from-class="transform opacity-0 scale-95" enter-to-class="transform opacity-100 scale-100" leave-active-class="transition ease-in duration-75" leave-from-class="transform opacity-100 scale-100" leave-to-class="transform opacity-0 scale-95">
                                <MenuItems class="absolute right-0 z-10 mt-2 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
                                    <div class="p-1">
                                        <MenuItem v-slot="{ active }">
                                            <button :class="[active ? 'bg-vue-green text-gray-900 rounded-lg' : 'text-gray-700', 'block px-4 py-2 text-xs w-full text-left']" @click.prevent="logout">Kilépés</button>
                                        </MenuItem>
                                    </div>
                                </MenuItems>
                            </transition>
                        </Menu>
                    </div>
                </template>
            </utility-bar>

            <slot/>
        </main>
    </div>
</template>
