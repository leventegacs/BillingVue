<script setup lang="ts">

defineProps({
    auth: Object
})

const form = useForm({
    email: "",
    password: "",
})

const submit = () => {
    form.post(route("login"), {
        onFinish: () => form.reset("password"),
    })
}
</script>

<template>
    <div class="flex min-h-full flex-1 flex-col justify-center px-6 py-12 lg:px-8 bg-test h-screen">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm flex justify-center">
            <SiteLogo class="text-primary-dark text-2xl" />
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <form class="space-y-6" @submit.prevent="submit">
                <div>
                    <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email cím</label>
                    <div class="mt-2">
                        <input id="email" v-model="form.email" type="email" autocomplete="email" required="true" class="block w-full rounded-md border-0 p-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                    </div>
                </div>

                <div>
                    <div class="flex items-center justify-between">
                        <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Jelszó</label>
                    </div>
                    <div class="mt-2">
                        <input id="password" v-model="form.password" type="password" autocomplete="current-password" required="true" class="block w-full rounded-md border-0 p-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                    </div>
                </div>

                <div>
                    <button type="submit" class="flex w-full justify-center rounded-md bg-primary-green-400 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-primary-green-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:bg-primary-green-600">
                        Belépés
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>
