require('./bootstrap');

import { createApp } from 'vue';
import GroupsList from './components/GroupsList.vue';
import DataTable from 'datatables.net-vue3'
import DataTablesLib from 'datatables.net';


createApp({
    components: {
        GroupsList,
    }
}).mount('#app');

DataTable.use(DataTablesLib);

