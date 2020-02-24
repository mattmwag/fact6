<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"></div>

                    <div class="card-body">
                        <label for="fact">Fact</label><br/>
                        <textarea id="fact" v-model="fact"></textarea>
                    </div>

                    <div class="card-body" >
                        <label for="answer">Answer</label><br/>
                        <textarea id="answer" v-model="answer"></textarea>
                    </div>

                    <div class="card-body">
                        <label for="supplement">Supplementary</label><br/>
                        <textarea id="supplement" v-model="supplement"></textarea>
                    </div>

                    <button
                            :disabled="!validated"
                            v-on:click="submit"
                    >Add Fact</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';

    export default {
        mounted() {
            console.log('Component mounted.')
        },
        created() {
        },
        data() {
            return {
                fact: '',
                answer: '',
                supplement: ''
            }
        },
        computed: {
            validated: function() {
                return this.fact && this.answer && this.supplement
            }
        },
        methods: {
            submit: function() {
                axios.post('/add', {
                    fact: this.fact,
                    answer: this.answer,
                    supplement: this.supplement,
                    id: this.user,
                });
                window.location = '/home';
            }
        },
        props: ['user']
    }
</script>
