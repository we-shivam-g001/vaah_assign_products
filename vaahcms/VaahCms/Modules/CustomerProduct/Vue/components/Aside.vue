<script setup>
import {reactive, ref} from 'vue';

import Menu from 'primevue/menu';

const inputs = {
}
const data = reactive(inputs);
const height = ref(window.innerHeight)

const menu = ref();

const items = ref([
    {
        label: 'CustomerProduct',
        items: [
            {
                label: 'Dashboard',
                icon: 'fa-regular fa-chart-bar',
                to: "/"
            },
            {
                label: 'customer',
                icon: 'fa-regular fa-chart-bar',
                to: "/customers"
            },
            {
                label: 'product',
                icon: 'fa-regular fa-chart-bar',
                to: "/products"
            },
            {
                label: 'user',
                icon: 'fa-regular fa-chart-bar',
                to: "/users"
            },
        ]
    },
]);

</script>
<template>

    <div v-if="height">
        <Menu :model="items"  class="w-full" />
    </div>

</template>


