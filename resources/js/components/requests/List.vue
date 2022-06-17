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
                
                <label for="name">Produto:</label>

                <select name="cars_id" @change="onChangeProduct($event)" class="form-select form-control">
                    <option disabled selected>---- Selecione um produto ----</option>
                    <option :value="product.id" v-for="(product, i) in products" :key="i">{{ product.name }}</option>
                </select>
            </div>
                    
        </div>
        <div class="col-5 m-1">
                
            <div class="row d-flex">
                
                <label for="name">Cliente:</label>

                <select name="cars_id" @change="onChangeUser($event)" class="form-select form-control">
                    <option disabled selected>---- Selecione um cliente ----</option>
                    <option :value="client.id" v-for="(client, i) in clients" :key="i">{{ client.name }}</option>
                </select>
            </div>
                    
        </div>
        <div class="col-5 m-1">
                
            <div class="row d-flex">
                
                <label for="name">Status:</label>

                <select v-model="status" name="status" @change="onChangeStatus($event)" class="form-select form-control">
                    <option disabled selected>---- Selecione um status ----</option>
                    
                    <option :value="1">Em Aberto</option>
                    <option :value="2">Pago</option>
                    <option :value="3">Cancelado</option>

                </select>
            </div>
                    
        </div>

        <div class="col-5 m-1">
                
            <div class="row d-flex">
                
                <p>
                    <label for="name">Quantiade:</label>
                    <input
                    id="amount"
                    v-model="amount"
                    @change="onChangeAmount(amount)"
                    type="number"
                    name="amount"
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
                    
                    <option :value="1">Produto</option>
                    <option :value="2">Cliente</option>
                    <option :value="3">Quantidade</option>
                    <option :value="4">Status</option>
                    <option :value="5">Data</option>

                </select>
            </div>
                    
        </div>
    </div>
    <div class="mt-4">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">N.Pedido</th>
                    <th scope="col">Produto</th>
                    <th scope="col">Cliente</th>
                    <th scope="col">Quantidade</th>
                    <th scope="col">Total</th>
                    <th scope="col">Status</th>
                    <th scope="col">Data</th>
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
                    <td><a v-on:click="show(request.id)">{{request.formatted_date}}</a></td>
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
import pagination from 'laravel-vue-pagination'
const axios = require('axios');
import NavBar from "../navbar/NavBar.vue"

export default {
    name:"users",
    components: {
        NavBar,
        pagination
        
    },
    data() {
        return {
            order:0,
            mydate: '2017-07-04',
            status:1,
            amount:0,
            products:[],
            clients:[],
            qtdPerPage:20,
            page:1,
            pages:[1,2,3,4,5,6,7,8,9],
            requests:[],
            users:{
                    type:Object,
                    default:null
                }
        }
    },
    mounted() {

        
        var data = new Date();

        this.mydate=data.getFullYear()+'-'+this.convertMount(data.getMonth()+1)+'-'+data.getDate();

        axios.get("/api/requests?page="+this.page+"&&qtdPerPage="+this.qtdPerPage).then((response) => {
            this.requests=response.data.requests.data
            this.qtdpages(response.data.requests.last_page)


        });

        axios.get("/api/products").then((response) => {
            this.products=response.data.products
        });

        axios.get("/api/clients").then((response) => {
            this.clients=response.data.clients
        });
    },
    watch: {
        qtdPerPage : function (val) {
            let size=(val+'').length;
            if(size!=0){
                axios.get("/api/requests?page="+this.page+"&&qtdPerPage="+this.qtdPerPage).then((response) => {
                    this.requests=response.data.requests.data
                    this.qtdpages(response.data.requests.last_page)

                });
            }
        },
        amount : function (val) {
            this.onChangeAmount(val)
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

        create(id){
            this.$router.push('/create-requests/');
        },

        show(id){
            this.$router.push('/request/'+id);
        },

        edit(id){   
            this.$router.push('/edit-requests/'+id);
        },

        del(id){

            this.page=1;
            this.qtdPerPage=20;
            axios.delete("/api/requests/"+id+"?page="+this.page+"&&qtdPerPage="+this.qtdPerPage).then((response) => {
                this.requests=response.data.requests

                this.qtdpages(response.data.requests.last_page)
            });
        },
        onChangePage(event){

            axios.get("/api/requests?page="+event.target.value+"&&qtdPerPage="+this.qtdPerPage).then((response) => {
                    this.requests=response.data.requests.data
                    this.qtdpages(response.data.requests.last_page)


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

        onChangeProduct(event){

            axios.get("/api/requests?page="+this.page+"&&qtdPerPage="+this.qtdPerPage+"&&product="+event.target.value).then((response) => {
                this.requests=response.data.requests.data
                this.qtdpages(response.data.requests.last_page)

            });
        },

        onChangeUser(event){

            axios.get("/api/requests?page="+this.page+"&&qtdPerPage="+this.qtdPerPage+"&&user="+event.target.value).then((response) => {
                this.requests=response.data.requests.data
                this.qtdpages(response.data.requests.last_page)

            });
        },

        onChangeStatus(event){

            axios.get("/api/requests?page="+this.page+"&&qtdPerPage="+this.qtdPerPage+"&&status="+event.target.value).then((response) => {
                this.requests=response.data.requests.data
                this.qtdpages(response.data.requests.last_page)

            });
        },
        onChangeAmount(amount){
            axios.get("/api/requests?page="+this.page+"&&qtdPerPage="+this.qtdPerPage+"&&amount="+amount).then((response) => {
                this.requests=response.data.requests.data
                this.qtdpages(response.data.requests.last_page)

            });
        },
        filterDate(){
                axios.get("/api/requests?page="+this.page+"&&qtdPerPage="+this.qtdPerPage+"&&date="+this.mydate).then((response) => {
                    this.requests=response.data.requests.data
                    this.qtdpages(response.data.requests.last_page)

                });
            
        },
        onChangeOrder(event){
            let order=event.target.value

            axios.get("/api/requests?page="+this.page+"&&qtdPerPage="+this.qtdPerPage+"&&order="+order).then((response) => {

                this.requests=response.data.requests.data
                this.qtdpages(response.data.requests.last_page)

            });
        }
    
    }
}
</script>

<style lang="scss">
@import './scss/requests.scss';
</style>