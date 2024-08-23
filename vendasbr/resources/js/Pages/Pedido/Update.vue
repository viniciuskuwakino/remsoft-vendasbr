<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';

const props = defineProps({
    pedido: {
        type: Object
    }
});

const form = useForm({
    id: props.pedido.id,
    nome: props.pedido.nome,
    preco: props.pedido.preco,
    status: props.pedido.status
});

function submitForm(){
    form.put(route('pedido.att'), {
        onSuccess:()=>form.reset()
    });
}

</script>

<template>
    <Head title="Atualizar o Pedido" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Atualizar o Pedido</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <form @submit.prevent="submitForm">
                            <div class="mb-4">
                                <label for="nome" class="block text-sm font-medium text-gray-700">Nome</label>
                                <input v-model="form.nome" type="text" id="nome" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                            </div>

                            <div class="mb-4">
                                <label for="preco" class="block text-sm font-medium text-gray-700">Preço</label>
                                <input v-model="form.preco" type="text" id="preco" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                            </div>

                            <div class="mb-4">
                                <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                                <input v-model="form.status" type="text" id="status" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                            </div>

                            <div class="flex justify-end">
                                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Atualizar</button>
                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
