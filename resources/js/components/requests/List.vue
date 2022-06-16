<template>
    <nav-bar></nav-bar>
    <div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">N.Pedido</th>
                    <th scope="col">Produto</th>
                    <th scope="col">Cliente</th>
                    <th scope="col">Quantidade</th>
                    <th scope="col">Total</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(request, i) in requests"
                      :key="i">
                    <th scope="row">{{request.id}}</th>
                    <td>
                        <a v-on:click="show(request.id)">{{request.product_name}}</a>
                    </td>
                    <td><a v-on:click="show(request.id)">{{request.name}}</a></td>
                    <td><a v-on:click="show(request.id)">{{request.amount}}</a></td>
                    <td><a v-on:click="show(request.id)">{{request.amount * request.unitary_value}}</a></td>
                    <td>
                        <p class="open" v-on:click="show(request.id)" v-if="request.status===1">Em Aberto</p>
                        <p class="paid-out" v-on:click="show(request.id)" v-if="request.status===2">Pago</p>
                        <p class="canceled" v-on:click="show(request.id)" v-if="request.status===3">Cancelado</p>
                    </td>
                    <td>
                        <button @click="edit(request.id)" type="button" class="btn btn-warning btn-sm">Editar</button>
                    </td>
                    <td>
                        <button @click="del(request.id)" type="button" class="btn btn-danger btn-sm">Deletar</button>
                    </td>
                </tr>
            </tbody>
        </table>
        <button @click="create" type="button" class="btn btn-primary">Novo Pedido</button>
    </div>
</template>

<script>
const axios = require('axios');
import NavBar from "../navbar/NavBar.vue"

export default {
    components: {
        NavBar
        
    },
    data() {
        return {
            requests:[]
        }
    },
    mounted() {
        axios.get("/api/requests").then((response) => {
            this.requests=response.data.requests
        });
    },
 
    methods: {

        create(id){
            this.$router.push('/create-requests/');
        },

        show(id){
            this.$router.push('/resquest/'+id);
        },

        edit(id){   
            this.$router.push('/edit-requests/'+id);
        },

        del(id){

            axios.delete("/api/requests/"+id).then((response) => {
                this.requests=response.data.requests
            });
        },
    
    }
}
</script>

<style lang="scss">
@import './scss/requests.scss';
</style>