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
                    <label for="name">Codigo de Barras</label>
                    <input
                    id="cod_bar"
                    v-model="cod_bar"
                    type="text"
                    name="cod_bar"
                    class="form-control"
                    >
                </p>
            </div> 
        </div>

        <div class="col-5 m-1">
            <div class="row d-flex">

                <p>
                    <label for="name">Preço Unitario</label>
                    <input
                    id="unitary_value"
                    v-model="unitary_value"
                    type="text"
                    name="unitary_value"
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
                    <option :value="2">Cod. Barras</option>
                    <option :value="3">Valor Unitario</option>
                    <option :value="4">Data</option>

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
                    <th scope="col">Codigo de Barras</th>
                    <th scope="col">Valor Unitario</th>
                    <th scope="col">Data de Criação</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(product, i) in products"
                      :key="i">
                    <th scope="row">{{product.id}}</th>
                    <td>
                        <a v-on:click="show(product.id)">{{product.name}}</a>
                    </td>
                    <td><a v-on:click="show(product.id)">{{product.bar_code}}</a></td>
                    <td><a v-on:click="show(product.id)">{{product.unitary_value}}</a></td>
                    <td><a v-on:click="show(product.id)">{{product.formatted_date}}</a></td>
                    <td>
                        <button @click="edit(product.id)" type="button" class="btn btn-warning btn-sm">Editar</button>
                    </td>
                    <td>
                        <button @click="del(product.id)" type="button" class="btn btn-danger btn-sm">Deletar</button>
                    </td>
                </tr>
            </tbody>
        </table>
        <button @click="create" type="button" class="btn btn-primary">Novo Produto</button>
    </div>
</template>

<script>
const axios = require('axios');
import NavBar from "../navbar/NavBar.vue"

export default {
    components: {
        NavBar
        
    },
    watch: {
        name : function(val){
            axios.get("/api/products?page="+this.page+"&&qtdPerPage="+this.qtdPerPage+"&&name="+val).then((response) => {
                this.qtdpages(response.data.products.last_page)
                this.products=response.data.products.data     

            });
        },
        cod_bar : function(val){
            axios.get("/api/products?page="+this.page+"&&qtdPerPage="+this.qtdPerPage+"&&bar_code="+val).then((response) => {
                this.qtdpages(response.data.products.last_page)
                this.products=response.data.products.data     

            });
        },
        unitary_value : function(val){
            axios.get("/api/products?page="+this.page+"&&qtdPerPage="+this.qtdPerPage+"&&unitary_value="+val).then((response) => {
                this.qtdpages(response.data.products.last_page)
                this.products=response.data.products.data     

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
    data() {
        return {
            unitary_value:"",
            cod_bar:"",
            qtdPerPage:20,
            page:1,
            pages:[1,2,3,4,5,6,7,8,9],
            mydate: '2017-07-04',
            name:"",
            products:[]
        }
    },
    mounted() {
        var data = new Date();

        this.mydate=data.getFullYear()+'-'+this.convertMount(data.getMonth()+1)+'-'+data.getDate();

        axios.get("/api/products?page="+this.page+"&&qtdPerPage="+this.qtdPerPage).then((response) => {
            this.qtdpages(response.data.products.last_page)
            this.products=response.data.products.data         
        });
    },
 
    methods: {

        onChangeOrder(event){
            let order=event.target.value

                axios.get("/api/products?page="+this.page+"&&qtdPerPage="+this.qtdPerPage+"&&order="+order).then((response) => {
                    this.qtdpages(response.data.products.last_page)
                    this.products=response.data.products.data 
                });

                
        },
        convertMount(mes){
            if(mes.length >1)
            {
                return mes;
            }
            else{
                return "0"+mes;
            }
        },
        filterDate(){
                axios.get("/api/products?page="+this.page+"&&qtdPerPage="+this.qtdPerPage+"&&date="+this.mydate).then((response) => {
                    this.qtdpages(response.data.products.last_page)
                    this.products=response.data.products.data 

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

        onChangePage(event){

            axios.get("/api/products?page="+event.target.value+"&&qtdPerPage="+this.qtdPerPage).then((response) => {
                    this.qtdpages(response.data.clients.last_page)
                    this.clients=response.data.clients.data     

                });
        },
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
            this.$router.push('/create-products/');
        },

        show(id){
            this.$router.push('/product/'+id);
        },

        edit(id){   
            this.$router.push('/edit-products/'+id);
        },

        del(id){


            this.page=1;
            this.qtdPerPage=20;
            axios.delete("/api/products/"+id+"?page="+this.page+"&&qtdPerPage="+this.qtdPerPage).then((response) => {
                
                this.qtdpages(response.data.products.last_page)
                this.products=response.data.products.data 
            });
        },
    
    }
}
</script>