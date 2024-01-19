require('./bootstrap');

import { createApp } from 'vue';
import Index from './components/Index.vue';
import DataTable from 'datatables.net-vue3'
import DataTablesLib from 'datatables.net';


createApp({
    components: {
        Index,
    }
}).mount('#app');

DataTable.use(DataTablesLib);

