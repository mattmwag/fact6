<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"></div>

                    <div class="card-body">
                        <label for="fact">Question</label><br/>
                        <textarea id="fact" v-model="question"></textarea>
                    </div>

                    <div class="card-body" >
                        <label for="answer">Answer</label><br/>
                        <textarea id="answer" v-model="answer"></textarea>
                    </div>

                    <div class="card-body">
                        <label for="supplement">Supplementary</label><br/>
                        <textarea id="supplement" v-model="supplement"></textarea>
                    </div>

                    <div class="card-body">
                        <label for="tags">Tags</label><br/>
                        <div id="tag" v-for="tag in JSON.parse(tags)">
                            <input type="checkbox"
                                   :id="tag.name"
                                   :value="tag.id"
                                   v-model="checkedTags"
                                   />
                            <label :for="tag.id">{{tag.name}}</label>
                        </div>
                    </div>
                    <div>
                        {{checkedTags}}
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
                question: '',
                answer: '',
                supplement: '',
                checkedTags: [],
            }
        },
        computed: {
            validated: function() {
                return this.question && this.answer && this.supplement
            }
        },
        methods: {
            submit: function() {
                axios.post('/add', {
                    question: this.question,
                    answer: this.answer,
                    supplement: this.supplement,
                    id: this.user,
                    tags: this.checkedTags
                });
                window.location = '/home';
            },
            slugify: function(tag) {
                return tag.toLowerCase().replace('/', '_');
            }
        },
        props: ['user', 'tags']
    }
</script>
