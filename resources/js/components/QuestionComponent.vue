<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" v-if="selectedFact.tags">{{ 'selectedFact.tags? selectedFact.tags.join(", ")' }}</div>

                    <div class="card-body">
                        {{ selectedFact.fact }}
                    </div>

                    <div class="card-body" v-if="seen">
                        <strong>A: {{ selectedFact.answer}}</strong>
                    </div>

                    <div class="card-body" v-if="seen">{{ selectedFact.supplementary }}</div>

                    <button v-if="!seen" v-on:click="seen = !seen">Show Answer</button>
                </div>
            </div>
            <div class="col-md-8 mt-2">
                <button class="align-middle" v-on:click="another">Another Question</button>
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
            axios.get('/facts')
                .then(response => {
                    this.facts = response.data
                    this.another()
                });
        },
        data() {
            return {
                selectedFact: null,
                seen: false,
                facts: []
            }
        },
        methods: {
            another() {
                this.seen = false
                const idx = Math.floor(Math.random() * this.facts.length);
                this.selectedFact = this.facts[idx];
            }
        }
    }
</script>
