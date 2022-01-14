<template>
    <div>
        <h1>Editar tarefa {{this.$route.params.id}}</h1>
        <div class="row mt-5">
            <div class="col-12">
                <span for="date">Nova data</span> <br>
                <input type="date" name="date" v-model="data">

            </div>
            <div class="col-12 mt-5">
                <span for="date">Nova Descricão</span>
                <input type="descricao" class="form-control" name="descricao" v-model="descricao">

            </div>
        </div>
        <div class="row mt-5 ">
            <div class="col-md-12">
                <router-link :to="{name:'lista'}">
                    <button class="btn btn-primary" @click="update" type="button">Salvar</button>
                </router-link>

                <router-link :to="{name:'lista'}">
                    <button class="btn btn-danger"  type="button">Voltar</button>
                </router-link>
            </div>
        </div>
    </div>
</template>

<script>
    const axios = require('axios');
    export default {
        data() {
            return {
                descricao: '',
                data: '',
            }
        },
        methods: {
            getTarefa() {

                axios.get(`editar/${this.$route.params.id}`).then((response) => {
                    this.descricao = response.data.descricao
                    this.data = response.data.datas
                })
            },
            update() {
                let data = {
                    descricao: this.descricao,
                    data: this.data
                }

                axios.put(`update/${this.$route.params.id}`, data).then((response) => {

                })
                this.getListagem()
            },
            getListagem() {
                axios.get('lista').then((response) => {
                    this.listagem = response.data
                })
            },
        },
        created() {
            this.getTarefa()
        },

    }
</script>

<style scoped>
    input {
        max-width: 600px;
        margin: auto;
    }
</style>