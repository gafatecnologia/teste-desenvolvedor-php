import { createRouter, createWebHistory } from 'vue-router'

import CompaniesIndex from '../components/companies/CompaniesIndex.vue'
import UsersList from '../components/users/UsersList.vue'

const routes = [
    {
        path: '/dashboard',
        name: 'companies.index',
        component: CompaniesIndex
    },

    {
        path: '/usuarios',
        name: 'users',
        component: UsersList
    }
];

export default createRouter({
    history: createWebHistory(),
    routes
})