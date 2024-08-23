<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, router } from '@inertiajs/vue3';

defineProps({
    pedido: {
        type: Object
    }
});

function handleEdit(pedidoId){
    router.get(`/pedido/atualizar/${pedidoId}`, {id:pedidoId})
}

function deletar(pedidoId) {
    router.delete(route('pedido.delete', pedidoId))
}

</script>

<template>
    <Head title="Pedido" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Pedido</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">Pedidos</div>
                    <div class="overflow-x-auto">
                        
                        <table class="table-auto w-full text-sm text-left rtl:text-right text-gray-500 light:text-gray-400">
                            <thead class="text-s text-gray-700 bg-gray-100 light:bg-gray-700 light:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3 bg-gray-100 light:bg-gray-800">
                                        Data
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-100 light:bg-gray-800">
                                        Nome
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Cliente
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Preço
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Status
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Ação
                                    </th>
                                </tr>
                            </thead>
                            <tbody v-for="pedido in pedido" key="pedido.id">
                                <tr class="bg-white border-b light:bg-gray-800 light:border-gray-700 hover:bg-gray-100 light:hover:bg-gray-600">
                                    <td class="px-6 py-3">
                                        {{ pedido['created_at'] }}
                                    </td>
                                    <td class="px-6 py-3">
                                        {{ pedido['nome'] }}
                                    </td>
                                    <td class="px-6 py-3">
                                        FULANO
                                    </td>
                                    <td class="px-6 py-3">
                                        {{ pedido['preco'] }}
                                    </td>
                                    <td class="px-6 py-3">
                                        {{ pedido['status'] }}
                                    </td>
                                    <td class="px-6 py-3">
                                        <button type="button" @click="handleEdit(pedido['id'])" class="ml-1 text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-2 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-1 py-1 text-center inline-flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-5">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                            </svg>
                                        </button>
                                        <button type="button" @click="deletar(pedido['id'])" class="ml-1  text-white bg-red-400 hover:bg-red-500 focus:ring-2 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-1 py-1 text-center inline-flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-5">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
