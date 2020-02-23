<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ selectedFact.tags.join(", ") }}</div>

                    <div class="card-body">
                        {{ selectedFact.question }}
                    </div>

                    <div class="card-body" v-if="seen">
                        <strong>A: {{ selectedFact.answer}}</strong>
                    </div>

                    <div class="card-body" v-if="seen">{{ selectedFact.supplement }}</div>

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
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        created() {
            this.another()
        },
        data() {
            return {
                selectedFact: null,
                seen: false,
                facts: [
                    {
                        tags: ["History", "US", "WW1"],
                        question: "Who is the only American to be promoted in his own lifetime to General of the Armies rank (the highest possible rank in the United States Army)?",
                        answer: "JOHN J. PERSHING",
                        supplement: 'Allowed to select his own insignia, Pershing chose to use four gold stars to distinguish himself from those officers who held the rank of General, which was signified with four silver stars. As during WW2 a five-star "General of the the Army" rank was created, he could possibly nowadays be considered a six-star general.'
                    },
                    {
                        tags: ["Geography"],
                        question: "The Uinta Mountains are foothills of which mountain range?",
                        answer: "THE ROCKIES",
                        supplement: "They are mostly in Utah."
                    }
                ]
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
