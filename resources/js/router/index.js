import { createRouter, createWebHistory } from 'vue-router'

import CompaniesIndex from '../components/companies/CompaniesIndex.vue'
//import UsersList from '../components/users/UsersList.vue'
import ClientsList from '../components/clients/List.vue'
import CreateClient from '../components/clients/Create.vue'
import Client from '../components/clients/Show.vue'
import Products from '../components/products/List.vue'
import Product from '../components/products/Show.vue'
import EditProduct from '../components/products/Edit.vue'
import EditClient from '../components/clients/Edit.vue'
import CreateProduct from '../components/products/Create.vue'
import Requests from '../components/requests/List.vue'
import CreateRequest from '../components/requests/Create.vue'
import EditRequest from '../components/requests/Edit.vue'
import Request from '../components/requests/Show.vue'
import Login from '../components/auth/Login.vue'
import Register from '../components/auth/Register.vue'
import Error from '../components/error/Error.vue'


const routes = [

    {
        path: '/dashboard',
        name: 'companies.index',
        component: CompaniesIndex
    },

    {
        path: '/clients',
        name: 'clients',
        component: ClientsList
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
    },
    {
        path: '/products',
        name: 'products',
        component: Products
    },

    {
        path: '/',
        name: 'list-products',
        component: Products
    },
    {
        path: '/edit-products/:id',
        name: 'edit-products',
        component: EditProduct
    },
    {
        path: '/create-products',
        name: 'create-products',
        component: CreateProduct
    },
    {
        path: '/client/:id',
        name: 'client',
        component: Client
    },
    {
        path: '/product/:id',
        name: 'product',
        component: Product
    },

    {
        path: '/edit-client/:id',
        name: 'edit-clients',
        component: EditClient
    },
    {
        path: '/create-clients',
        name: 'create-clients',
        component: CreateClient
    },

    {
        path: '/requests',
        name: 'requests',
        component: Requests
    },
    {
        path: '/create-requests',
        name: 'create-requests',
        component: CreateRequest
    },
    {
        path: '/edit-requests/:id',
        name: 'edit-requests',
        component: EditRequest
    },
    {
        path: '/request/:id',
        name: 'request',
        component: Request
    },
];


export default createRouter({
    history: createWebHistory(),
    routes
})