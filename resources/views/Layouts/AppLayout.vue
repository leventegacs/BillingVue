<script lang="ts" setup>
import {
    BuildingOfficeIcon,
    ArchiveBoxArrowDownIcon,
    UsersIcon,
    CubeTransparentIcon,
    ArchiveBoxXMarkIcon,
    CircleStackIcon
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
              <site-logo class="text-xl text-primary-light-400"/>
          </template>

            <ItemGroup headers="Vezérlőpult">
                <Item :href="route('admin.dashboard')"
                      :active="current('admin.dashboard')"
                >
                    <BuildingOfficeIcon class="h-6 w-6"/>
                    Vezérlőpult
                </Item>
            </ItemGroup>

            <ItemGroup headers="Bejövő készlet">
                <Item :href="route('admin.inwards.index')"
                      :active="current('admin.inwards.*')">
                    <ArchiveBoxArrowDownIcon class="h-6 w-6"/>
                    Bevételezés
                </Item>
            </ItemGroup>

            <ItemGroup headers="Kimenő készlet">
                <Item :href="route('admin.outwards.index')"
                      :active="current('admin.outwards.*')">
                    <ArchiveBoxXMarkIcon class="h-6 w-6"/>
                    Kivételezés
                </Item>
            </ItemGroup>

            <ItemGroup headers="Termékkezelő">
                <Item :href="route('admin.products.index')"
                      :active="current('admin.products.*')">
                    <CircleStackIcon class="h-6 w-6"/>
                    Termékek
                </Item>
            </ItemGroup>

            <ItemGroup headers="Rendszer">
                <Item :href="route('admin.partners.index')"
                      :active="current('admin.partners.index')"
                >
                    <UsersIcon class="h-6 w-6"/>
                    Partnerek
                </Item>
            </ItemGroup>
        </sidebar>
        <main class="lg:pl-72 bg-test min-h-screen">
            <utility-bar>
                <template #start>
                    <div class="relative flex flex-1 items-center">
                        <CubeTransparentIcon class="h-10 w-10 bg-primary-green-400 rounded-xl p-1" />
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
                                            <button :class="[active ? 'bg-primary-green-400 text-white rounded-lg' : 'text-gray-700', 'block px-4 py-2 text-xs w-full text-left']" @click.prevent="logout">Kilépés</button>
                                        </MenuItem>
                                    </div>
                                </MenuItems>
                            </transition>
                        </Menu>
                    </div>
                </template>
            </utility-bar>
            <div class="p-10 space-y-6">
                <slot/>
            </div>
        </main>
    </div>
</template>
