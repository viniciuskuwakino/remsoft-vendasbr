<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Link, useForm, usePage } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';

const props = defineProps({
    user:{
        type: Object
    }
})

const form = useForm({
    id: props.user.id,
    name: props.user.name,
    email: props.user.email,
    cpf: props.user.cpf,
    password: ''
});

function handleSubmit() {
    form.put(route('funcionario.att'), {
        onSuccess: ()=> form.reset() 
    })
}

</script>

<template>
    <Head title="Update" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Atualizar Cadastro</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <form @submit.prevent="handleSubmit" class="mt-6 space-y-6">
                            <div>
                                <InputLabel for="name" value="Name" />

                                <TextInput
                                    id="name"
                                    type="text"
                                    class="mt-1 block w-full"
                                    v-model="form.name"
                                    required
                                    autofocus
                                    autocomplete="name"
                                />

                                <InputError class="mt-2" :message="form.errors.name" />
                            </div>

                            <div>
                                <InputLabel for="email" value="Email" />

                                <TextInput
                                    id="email"
                                    type="email"
                                    class="mt-1 block w-full"
                                    v-model="form.email"
                                    required
                                    autocomplete="username"
                                />

                                <InputError class="mt-2" :message="form.errors.email" />
                            </div>

                            <div>
                                <InputLabel for="cpf" value="CPF" />

                                <TextInput
                                    id="cpf"
                                    type="number"
                                    class="mt-1 block w-full"
                                    v-model="form.cpf"
                                    required
                                    autofocus
                                    autocomplete="cpf"
                                />

                                <InputError class="mt-2" :message="form.errors.cpf" />
                            </div>

                            <div>
                                <InputLabel for="password" value="Senha" />

                                <TextInput
                                    id="password"
                                    type="password"
                                    class="mt-1 block w-full"
                                    v-model="form.password"
                                    required
                                    autofocus
                                    autocomplete="password"
                                />

                                <InputError class="mt-2" :message="form.errors.password" />
                            </div>

                            <div v-if="mustVerifyEmail && user.email_verified_at === null">
                                <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                                    Your email address is unverified.
                                    <Link
                                        :href="route('verification.send')"
                                        method="post"
                                        as="button"
                                        class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                                    >
                                        Clique aqui para reenviar o e-mail de verificação.
                                    </Link>
                                </p>

                                <div
                                    v-show="status === 'verification-link-sent'"
                                    class="mt-2 font-medium text-sm text-green-600 dark:text-green-400"
                                >
                                    A new verification link has been sent to your email address.
                                </div>
                            </div>

                            <div class="flex items-center gap-4">
                                <PrimaryButton :disabled="form.processing">Salvar</PrimaryButton>

                                <Transition
                                    enter-active-class="transition ease-in-out"
                                    enter-from-class="opacity-0"
                                    leave-active-class="transition ease-in-out"
                                    leave-to-class="opacity-0"
                                >
                                    <p v-if="form.recentlySuccessful" class="text-sm text-gray-600 dark:text-gray-400">Criado com Sucesso.</p>
                                </Transition>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

