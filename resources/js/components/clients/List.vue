<template>
    <nav-bar></nav-bar>

    <div class="row m-4">
        <h3>Paginação:</h3>
        <div class="col-5 m-1">
                
            <div class="row d-flex">
                
                <label for="name">Selecionar Pagina:</label>

                <select v-model="page" @change="onChangePage($event)" class="pages">
                    <option :value="item" v-for="(item, index) in pages" :key="index">{{ item }}</option>
                </select>
            </div>
                    
        </div>

        <div class="col-5">
            <div class="row d-flex">
                
                
                <label for="name">Itens por pagina:</label>
                <br>
                <input
                                id="page"
                                v-model="qtdPerPage"
                                type="number"
                                name="page"
                                @keyup.enter="onChangeQtdPage($event)"
                            >
            </div>
                    
        </div>
    </div>

    <div class="row m-4">
        <h3>Filtros:</h3>
        <div class="col-5 m-1">
                
            <div class="row d-flex">

                <p>
                    <label for="name">Nome</label>
                    <input
                    id="name"
                    v-model="name"
                    type="text"
                    name="name"
                    class="form-control"
                    >
                </p>

                
            </div>
                    
        </div>
        <div class="col-5 m-1">
            <div class="row d-flex">
                <p>
                    <label for="name">Email</label>
                    <input
                    id="email"
                    v-model="email"
                    type="text"
                    name="email"
                    class="form-control"
                    >
                </p>
            </div>
        </div>

        <div class="col-5 m-1">
                
            <label for="name">Data:</label>
            <div class="row d-flex">
                
                <input @click="filterDate()" type="date" v-model="mydate" />
            </div>
            
                    
        </div>
    </div>

    <div class="row m-4">
        <h3>Ordenação:</h3>
        <div class="col-5 m-1">
                
            <div class="row d-flex">
                
                <label for="name">Ordem:</label>

                <select v-model="order" name="order" @change="onChangeOrder($event)" class="form-select form-control">
                    <option disabled selected>---- Selecione uma ordenação ----</option>
                    
                    <option :value="1">Nome</option>
                    <option :value="2">Email</option>
                    <option :value="3">Data</option>

                </select>
            </div>
                    
        </div>
    </div>
    <div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Email</th>
                    <th scope="col">Data de Criação</th>
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
                        <a v-on:click="show(client.id)">{{client.formatted_date}}</a>
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
            qtdPerPage:20,
            page:1,
            pages:[1,2,3,4,5,6,7,8,9],
            mydate: '2017-07-04',
            order:0,
            name:"",
            email:"",
            clients:[]
        }
    },
    mounted() {
        var data = new Date();

        this.mydate=data.getFullYear()+'-'+this.convertMount(data.getMonth()+1)+'-'+data.getDate();

        axios.get("/api/clients?page="+this.page+"&&qtdPerPage="+this.qtdPerPage).then((response) => {
            this.qtdpages(response.data.clients.last_page)
            this.clients=response.data.clients.data         
        });
    },
    watch: {
        qtdPerPage : function (val) {
            let size=(val+'').length;
            if(size!=0){
                axios.get("/api/clients?page="+this.page+"&&qtdPerPage="+this.qtdPerPage).then((response) => {
                    this.clients=response.data.clients.data  
                    this.qtdpages(response.data.clients.last_page)

                });
            }
        },
        name : function(val){
            axios.get("/api/clients?page="+this.page+"&&qtdPerPage="+this.qtdPerPage+"&&name="+val).then((response) => {
                this.clients=response.data.clients.data  
                this.qtdpages(response.data.clients.last_page)

            });
        },

        email : function(val){
            axios.get("/api/clients?page="+this.page+"&&qtdPerPage="+this.qtdPerPage+"&&email="+val).then((response) => {
                this.clients=response.data.clients.data  
                this.qtdpages(response.data.clients.last_page)

            });
        },
        mydate : function (val) {

            var data = new Date();
            var value=data.getFullYear()+'-'+this.convertMount(data.getMonth()+1)+'-'+data.getDate();

            
            if(this.mydate!=value)
            {
                this.filterDate()
            }
        },

    },
 
    methods: {

        convertMount(mes){
            if(mes.length >1)
            {
                return mes;
            }
            else{
                return "0"+mes;
            }
        },
        onChangePage(event){

            axios.get("/api/clients?page="+event.target.value+"&&qtdPerPage="+this.qtdPerPage).then((response) => {
                    this.qtdpages(response.data.clients.last_page)
                    this.clients=response.data.clients.data     

                });
        },

        onChangeOrder(event){
            let order=event.target.value

                axios.get("/api/clients?page="+this.page+"&&qtdPerPage="+this.qtdPerPage+"&&order="+order).then((response) => {
                    this.qtdpages(response.data.clients.last_page)
                    this.clients=response.data.clients.data  

                });

                
        },
        filterDate(){
                axios.get("/api/clients?page="+this.page+"&&qtdPerPage="+this.qtdPerPage+"&&date="+this.mydate).then((response) => {
                    this.qtdpages(response.data.clients.last_page)
                    this.clients=response.data.clients.data 

                });
            
        },

        qtdpages(lastPage){
            var array = [];
            for(let i = 0; i < lastPage; i++)
            {
                array[i]=i+1;

            }
            this.pages=array;

        },

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


            this.page=1;
            this.qtdPerPage=20;
            axios.delete("/api/clients/"+id+"?page="+this.page+"&&qtdPerPage="+this.qtdPerPage).then((response) => {

                this.clients=response.data.clients.data

                this.qtdpages(response.data.clients.last_page)
            });
        },
    
    }
}
</script>