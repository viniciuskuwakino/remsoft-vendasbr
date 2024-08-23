<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Link, useForm} from '@inertiajs/vue3';
import { Head } from '@inertiajs/vue3';

const props = defineProps({
    cliente: {
        type: Object
    }
})

const form = useForm({
    id: props.cliente.id,
    name: props.cliente.nome,
    email: props.cliente.email,
    cpf: props.cliente.cpf,
    senha: props.cliente.senha,
    endereco: props.cliente.endereco
});

function handleSubmit(){
    form.put(route('cliente.att'), {
        onSuccess:()=>form.reset()
    });
}

</script>

<template>
    <Head title="Alterar cadastro do Cliente" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Alterar cadastro dos Clientes</h2>
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
                                    placeholder="Digite seu nome"
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
                                    placeholder="Digite seu email"
                                />

                                <InputError class="mt-2" :message="form.errors.email" />
                            </div>

                            <div>
                                <InputLabel for="cpf" value="CPF" />

                                <TextInput
                                    id="cpf"
                                    type="text"
                                    class="mt-1 block w-full"
                                    v-model="form.cpf"
                                    required
                                    autofocus
                                    autocomplete="cpf"
                                    placeholder="Digite seu cpf"
                                />

                                <InputError class="mt-2" :message="form.errors.cpf" />
                            </div>
                          
                            <div>
                                <InputLabel for="senha" value="Senha" />

                                <TextInput
                                    id="senha"
                                    type="password"
                                    class="mt-1 block w-full"
                                    v-model="form.senha"
                                    required
                                    autofocus
                                    autocomplete="senha"
                                    placeholder="Digite sua senha"
                                />

                                <InputError class="mt-2" :message="form.errors.senha" />
                            </div>

                            <div>
                                <InputLabel for="endereco" value="Endereço" />

                                <TextInput
                                    id="endereco"
                                    type="text"
                                    class="mt-1 block w-full"
                                    v-model="form.endereco"
                                    required
                                    autofocus
                                    autocomplete="endereco"
                                    placeholder="Digite seu endereço"
                                />

                                <InputError class="mt-2" :message="form.errors.endereco" />
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
                                        Click here to re-send the verification email.
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
                                <PrimaryButton :disabled="form.processing">Enviar</PrimaryButton>

                                <Transition
                                    enter-active-class="transition ease-in-out"
                                    enter-from-class="opacity-0"
                                    leave-active-class="transition ease-in-out"
                                    leave-to-class="opacity-0"
                                >
                                    <p v-if="form.recentlySuccessful" class="text-sm text-gray-600 dark:text-gray-400">Saved.</p>
                                </Transition>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
