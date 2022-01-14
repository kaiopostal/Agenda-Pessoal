<template>
  <div>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
      Adicionar nova tarefa
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-6">
                <input type="date" class="mt-4" name="datas"  v-model="data">
                
              </div>
              <div class="col-md-6">
                <span for="descricao">Descricão</span>
                <input name="descricao" type="text" class="form-control" v-model="descricao">
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
            <button type="button" class="btn btn-primary" @click="addTarefa">Criar</button>
          </div>
        </div>
      </div>
    </div>

    <table class="table">
      <thead>
        <tr>
          <th scope="col">Data</th>
          <th scope="col">Descrição</th>
          <th scope="col">Ações</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="tarefa in listagem" :key="tarefa.id">
         
          <td>{{tarefa.datas}}</td>
          <td>{{tarefa.descricao}}</td>
          <td>
            <router-link :to="{name:'editar', params:{id:tarefa.id}}">
            <b class="btn btn-outline-warning">Editar</b>

            </router-link>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
const axios = require('axios');
  export default {
    data() {
      return {
        listagem: [],
        descricao: '',
        data: ''
      }
    },
    methods: {
      adicionarListagem() {

      },
      addTarefa(){
        let data = {descricao:this.descricao, data:this.data}
        axios.post('adicionar', data).then((response)=>{
            console.log(response);
        })
        this.listagem.push(data)
        this.descricao = ''
        this.data = ''
      },
      getListagem(){
        axios.get('lista').then((response)=>{
          this.listagem = response.data
        })
      }
    },
    created() {
      this.getListagem()

    },

  }
</script>

<style>

</style>