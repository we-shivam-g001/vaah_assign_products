<script setup>
import { vaah } from '../../vaahvue/pinia/vaah'
import { useCustomerStore } from '../../stores/store-customers'
import VhField from './../../vaahvue/vue-three/primeflex/VhField.vue'
import {onMounted, ref} from "vue";
import {useRoute} from "vue-router";
import Dialog from 'primevue/dialog';

const store = useCustomerStore();
const useVaah = vaah();
const route = useRoute();

onMounted(async () => {

    /**
     * If record id is not set in url then
     * redirect user to list view
     */
    if (route.params && !route.params.id) {
        store.toList();
        return false;
    }

    /**
     * Fetch the item from the database
     */
    if (route.params && route.params.id) {
        await store.getItem(route.params.id);
    }

    /**
     * Fetch user roles from the database
     */
    if (store.item && !store.product_customer) {
        await store.getItemProducts();
    }

    /**
     * Fetch user roles menu items
     */
    await store.getProductUserMenuItems();
});
//
// //--------toggle item menu--------//
const user_roles_menu_state = ref();
//
const toggleItemMenu = (event) => {
    user_roles_menu_state.value.toggle(event);
};
//--------toggle item menu--------//

</script>


<template>
    <div class="col-5" >
        <Panel v-if="store && store.item">
            <template class="p-1" #header>
                <div class="flex flex-row">
                    <div class="font-semibold text-sm">
                        {{ store.item.name }}
                    </div>
                </div>
            </template>

            <template #icons>
                <div class="p-inputgroup">
                    <Button class="p-button-sm"
                            :label=" '#' + store.item.id "
                            @click="useVaah.copy(store.item.id)"
                            data-testid="users-role_id"
                    />

                    <!--item_menu-->
                    <Button class="p-button-sm"
                            icon="pi pi-angle-down"
                            aria-haspopup="true"
                            @click="toggleItemMenu"
                            data-testid="users-role_menu"
                    />

                    <Menu ref="user_roles_menu_state"
                          :model="store.customer_product_menu"
                          :popup="true"
                    />
                    <!--/item_menu-->

                    <Button class="p-button-sm"
                            icon="pi pi-times"
                            data-testid="users-role_view"
                            @click="store.toList()"
                    />
                </div>
            </template>

            <div class="grid p-fluid">
                <div class="col-12">
                    <div class="p-inputgroup">
                         <span class="p-input-icon-left">
                            <i class="pi pi-search" />
                            <InputText class="w-full p-inputtext-sm"
                                       placeholder="Search"
                                       type="text"
                                       v-model="store.product_customer_query.q"
                                       @keyup.enter="store.delayedProductCustomerSearch()"
                                       @keyup.enter.native="store.delayedProductCustomerSearch()"
                                       @keyup.13="store.delayedProductCustomerSearch()"
                            />
                         </span>

                        <Button class="p-button-sm"
                                label="Reset"
                                data-testid="users-role_reset"
                                @click="store.resetProductCustomerFilters()"
                        />
                    </div>
                </div>
            </div>
            <DataTable v-if="store && store.product_customer"
                       :value="store.product_customer.list.data"
                       dataKey="id"
                       class="p-datatable-sm"
                       stripedRows
                       responsiveLayout="scroll"
            >


                <Column field="name"
                        header="Name"
                        class="flex align-items-center"
                >
                    <template #body="prop">
                        {{ prop.data.name }}
                        <Button class="p-button-tiny p-button-text"
                                data-testid="users-table-to-edit"
                                v-tooltip.top="'Copy Slug'"
                                @click="useVaah.copy(prop.data.slug)"
                                icon="pi pi-copy"
                        />
                    </template>
                </Column>



                <Column field="" header="Has Customer">
                    <template #body="prop">
                        <Button label="Yes"
                                class="p-button-sm p-button-success p-button-rounded"
                                v-if="prop.data.pivot.is_active === 1"
                                @click="store.changeCustomerProduct(prop.data)"
                                data-testid="role-user_status_yes"
                        />

                        <Button label="No"
                                class="p-button-sm p-button-danger p-button-rounded"
                                data-testid="role-user_status_no"
                                v-else
                                @click="store.changeCustomerProduct(prop.data)"
                        />
                    </template>
                </Column>

                <Column header="View">
                    <template #body="prop">

                        <Button class="p-button-sm p-button-rounded p-button-outlined"
                                v-tooltip.top="'View'"
                                @click="store.showModal(prop.data)"
                                data-testid="users-role_details_view"
                                icon="pi pi-eye"
                                label="View"
                        />
                    </template>
                </Column>
            </DataTable>
            <!--paginator-->
            <Paginator v-if="store && store.product_customer"
                       v-model:rows="store.product_customer_query.rows"
                       :totalRecords="store.product_customer.list.total"
                       @page="store.userPaginate($event)"
                       :rowsPerPageOptions="store.rows_per_page"
                       class="bg-white-alpha-0 pt-2"
            />
            <!--/paginator-->
        </Panel>

        <Dialog header="Details"
                v-model:visible="store.displayModal"
                :breakpoints="{'960px': '75vw', '640px': '90vw'}" :style="{width: '50vw'}"
                :modal="true"
        >
            <div v-for="(item,index) in store.modalData" :key="index">
                <span> {{ index }} </span> : {{ item }}
                {{}}


                <Divider />
            </div>
<!--            <div>-->
<!--                <span>Created At:</span> {{ store.modalData.created_at }}-->
<!--                <Divider />-->
<!--                <span>Updated At:</span> {{ store.modalData.updated_at }}-->
<!--            </div>-->
        </Dialog>
    </div>

</template>
