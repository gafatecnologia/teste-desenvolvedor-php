import { createRouter, createWebHistory } from 'vue-router'

import CompaniesIndex from '../components/companies/CompaniesIndex.vue'
import UsersList from '../components/users/UsersList.vue'
import Login from '../components/auth/Login.vue'
import Register from '../components/auth/Register.vue'
import Error from '../components/error/Error.vue'
import Page2 from '../components/page2.vue'


const routes = [
    {
        path: '/',
        name: 'page2',
        component: Page2
    },
    {
        path: '/dashboard',
        name: 'companies.index',
        component: CompaniesIndex
    },

    {
        path: '/usuarios',
        name: 'users',
        component: UsersList
    },
    {
        path: '/login',
        name: 'login',
        component: Login
    },
    {
        path: '/register',
        name: 'register',
        component: Register
    },
    {
        path: "/:catchAll(.*)",
        name: 'NotFound',
        component: Error
    }
];

export default createRouter({
    history: createWebHistory(),
    routes
})