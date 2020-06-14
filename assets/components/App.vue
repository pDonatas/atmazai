<template>
    <div>
        <div class="card card-styled">
            <div class="card-header">
                Atsitiktinis atmazas
            </div>
            <div class="card-body">
                <span v-if="this.randomEvasion.Question !== null">Į klausimą {{this.randomEvasion.Question}} atsakyk</span>
                {{this.randomEvasion.Answer}}
                <hr/>
                <button v-on:click="fetchRandom" type="button" class="form-control btn btn-primary">Duok kitą</button></a>
            </div>
        </div>

        <div class="card card-styled">
            <div class="card-header">
                Duok man atmazą
            </div>
            <div class="card-body">
                <form class="mb-4">
                    <div class="form-group">
                        <label for="question">Klausimas/Teiginys</label>
                        <input id="question" v-model="question" placeholder="Klausimas" class="form-control">
                    </div>
                </form>
            </div>
        </div>
        <div v-show="question.length > 0" class="card">
            <div v-if="this.question.length > 0" class="card-header">
                Į klausimą {{this.question}} atsakyk
            </div>
            <div class="card-body">
                <ul class="list-group">
                    <li class="list-group-item">
                        {{this.Evasion.Answer}}
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
    import * as axios from "axios";

    export default {
        data() {
            return {
                randomEvasion: {
                    id: '',
                    Question: '',
                    Answer: ''
                },
                Evasion: {
                    id: '',
                    Question: '',
                    Answer: ''
                },
                question: '',
                req: axios.create({
                    baseUrl: '/',
                })
            }
        },
        mounted() {
            this.fetchRandom()
        },
        watch: {
            question: function (value) {
                this.question = value;
                this.fetchEvasions();
            }
        },
        methods: {
            fetchRandom(){
                let vm = this;
                vm.req.post('api/random').then(response => {
                    vm.randomEvasion.Answer = response.data.answer;
                    vm.randomEvasion.Question = response.data.question;
                    vm.randomEvasion.id = response.data.id;
                }).catch(error => {
                    console.error(error);
                });
            },
            fetchEvasions(){
                let vm = this;
                vm.req.post('api/find', {
                    question: this.question
                }).then(response => {
                    vm.Evasion.Question = response.data.question;
                    vm.Evasion.Answer = response.data.answer;
                    vm.Evasion.id = response.data.id;
                }).catch(error => {
                    console.error(error);
                });
            }
        }
    }
</script>