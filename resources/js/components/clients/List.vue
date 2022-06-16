<template>
    <nav-bar></nav-bar>
    <div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Email</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(client, i) in clients"
                      :key="i">
                    <th scope="row">{{client.id}}</th>
                    <td>
                        <a v-on:click="show(client.id)">{{client.name}}</a>
                    </td>
                    <td>
                        <a v-on:click="show(client.id)">{{client.email}}</a>
                    </td>
                    <td>
                        <button @click="edit(client.id)" type="button" class="btn btn-warning btn-sm">Editar</button>
                    </td>
                    <td>
                        <button @click="del(client.id)" type="button" class="btn btn-danger btn-sm">Deletar</button>
                    </td>
                </tr>
            </tbody>
        </table>
        <button @click="create" type="button" class="btn btn-primary">Novo Cliente</button>
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
            clients:[]
        }
    },
    mounted() {
        axios.get("/api/clients").then((response) => {
            console.log(response);
            this.clients=response.data.clients
        });
    },
 
    methods: {

        create(id){
            this.$router.push('/create-clients');
        },

        show(id){
            this.$router.push('/client/'+id);
        },

        edit(id){   
            this.$router.push('/edit-client/'+id);
        },
        del(id){

            axios.delete("/api/clients/"+id).then((response) => {
                this.clients=response.data.clients
            });
        },
    
    }
}
</script>