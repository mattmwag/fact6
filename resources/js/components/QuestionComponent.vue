<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" v-if="selectedFact">
                    <div class="card-header">{{ selectedFact.creator.name }} on {{ selectedFact.created_at | formatDate }}</div>
                    <div class="card-header" v-if="selectedFact.tags">{{ selectedFact.tags? selectedFact.tags.map(tag => tag.name).join(', ') : '' }}</div>

                    <div class="card-body">
                        {{ selectedFact.question }}
                    </div>

                    <div class="card-body" v-if="seen">
                        <strong>A: {{ selectedFact.answer}}</strong>
                    </div>

                    <div class="card-body" v-if="seen">{{ selectedFact.supplementary }}</div>

                    <button v-if="!seen" v-on:click="seen = !seen">Show Answer</button>
                </div>
            </div>
            <div class="col-md-8 mt-2" v-if="selectedFact">
                <button class="align-middle" v-on:click="another">Another Question</button>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';
    import moment from 'moment';

    Vue.filter('formatDate', function(value) {
        if (value) {
            return moment(String(value)).format('MM/DD/YYYY')
        }
    });

    export default {
        mounted() {
            console.log('Component mounted.')
        },
        created() {
            axios.get('/facts/' + this.tag)
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
        },
        props: ['tag']
    }
</script>
