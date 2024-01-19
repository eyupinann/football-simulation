<template>
    <div class="container mx-auto" >
        <div class="max-w-screen-xl mx-auto my-8" v-if="fixtures[0] == null">
            <div class="flex justify-center">
                <div class="w-full md:w-3/4 lg:w-1/2 xl:w-1/3">
                    <h2 class="text-3xl font-bold mb-4">Tournament Teams</h2>
                    <table class="w-full border-collapse border">
                        <thead>
                        <tr>
                            <th class="p-3 border bg-gray-800 text-white">Team Name</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="team in teams" :key="team.id">
                            <td class="p-3 border">{{ team.team_name }}</td>
                        </tr>
                        </tbody>
                    </table>
                    <div class="mt-4">
                        <button @click="generateFixtures" class="px-4 py-2 bg-teal-500 text-white rounded">
                            Generate Fixtures
                        </button>
                    </div>


                </div>
            </div>
        </div>
        <div v-if="fixtures && fixtures[0] && simulationStarted == false" class="mt-8">
            <h2 class="text-3xl font-bold mb-4">Generated Fixture</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div v-for="(group, stage) in groupedFixtures" :key="stage" class="mb-4">
                    <div class="bg-gray-800 text-white p-4 rounded">
                        <h3 class="text-lg font-bold mb-2">{{ stage }}</h3>
                        <table class="w-full border-collapse border">
                            <thead>
                            <tr>
                                <th class="p-3 border bg-gray-700 text-white">Home Team</th>
                                <th class="p-3 border bg-gray-700 text-white">Away Team</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="fixture in group" :key="fixture.id">
                                <td class="p-3 border">{{ fixture.home.team_name }}</td>
                                <td class="p-3 border">{{ fixture.away.team_name }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="mt-2">
                    <button @click="startSimulation" class="px-9 py-4 bg-teal-500 text-white rounded">
                        Start Simulation
                    </button>
                </div>
            </div>
        </div>


        <div v-if="simulationStarted">
            <h2 class="text-3xl font-bold mb-4">Simulation</h2>
            <div class="flex justify-center mb-4">
                <div class="w-full  flex flex-row space-x-4">

                <!-- Sol Tablo -->
                    <div class="flex-shrink-0 w-1/3">
                            <table class="w-11/12 border-collapse border">

                            <thead>

                                <tr>
                                    <th class="p-3 border bg-gray-800 text-white">Team Name</th>
                                    <th class="p-3 border bg-gray-800 text-white">P</th>
                                    <th class="p-3 border bg-gray-800 text-white">W</th>
                                    <th class="p-3 border bg-gray-800 text-white">D</th>
                                    <th class="p-3 border bg-gray-800 text-white">L</th>
                                    <th class="p-3 border bg-gray-800 text-white">GD</th>
                                </tr>
                            </thead>
                                <tbody>
                                <tr v-for="team in teams2[0] ? teams2 : teams " :key="team.id">
                                <td class="p-3 border">{{ team.team_name }}</td>
                                    <td class="p-3 border">{{ team.points }}</td>
                                    <td class="p-3 border">{{ team.win }}</td>
                                    <td class="p-3 border">{{ team.draw }}</td>
                                    <td class="p-3 border">{{ team.loss }}</td>
                                    <td class="p-3 border">{{ team.goal_difference }}</td>
                                </tr>
                                </tbody>

                            </table>
                    </div>
                    <!-- Orta Tablo -->
                    <div class="flex-shrink-0 w-1/3">
                        <table class="w-11/12 border-collapse border">
                            <thead>
                            <tr>
                                <th class="p-3 border bg-gray-800 text-white">Week {{ results[0]?.match?.stage.match(/\d+/)?.[0]  || 1 }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-if="results[0]" v-for="fixture in results" :key="fixture.id">
                                <td class="p-3 border ">{{ fixture.match.home.team_name }} {{fixture.home_team_goals}} - {{ fixture.match.away.team_name }} {{fixture.away_team_goals}}</td>
                            </tr>

                            <!-- If 'results' is not defined, render the second block -->
                            <tr v-else v-for="fixture in groupedFixtures['week 1']" :key="fixture.id">
                                <td class="p-3 border">{{ fixture.home.team_name }} - {{ fixture.away.team_name }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- Sağ Tablo -->
                    <div class="flex-shrink-0 w-1/3">
                        <table class="w-11/12 border-collapse border">
                            <thead>
                            <tr>
                                <th class="p-3 border bg-gray-800 text-white">Championship Prodiction</th>
                                <th class="p-3 border bg-gray-800 text-white">%</th>

                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="team in teams" :key="team.id">
                                <td class="p-3 border">{{ team.team_name }}</td>
                                <td class="p-3 border">{{ calculateChampionshipProbability(team.strength) }}%</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>


                </div>
            </div>
            <hr>
            <div class="flex justify-center mt-4">
                <div class="w-full  flex flex-row space-x-4">
                    <div class="flex-shrink-0 w-1/3">
                        <div class="mt-2">
                            <button @click="startAllWeeks" :disabled="isButtonDisabled" class="px-9 py-4 bg-teal-500 text-white rounded">
                                Play All Weeks
                            </button>
                        </div>
                    </div>
                    <div class="flex-shrink-0 w-1/3">
                        <div class="mt-2">
                            <button @click="startNextWeek" class="px-9 py-4 bg-teal-500 text-white rounded">
                                Play Next Weeks
                            </button>
                        </div>
                    </div>
                    <div class="flex-shrink-0 w-1/3">
                        <div class="mt-2">
                            <button @click="resetData" class="px-9 py-4 bg-rose-600 text-white rounded">
                                Reset Data
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            teams: [],
            teams2: [],
            fixtures: [],
            simulationStarted: false,
            results: [],
        };
    },

    created() {
        this.fetchTeams();
    },
    methods: {
        result() {
            axios.get('/api/result')
                .then(response => {
                    this.results = response.data.data;
                    console.log(this.results)
                })
                .catch(error => {
                    console.log(error);
                });
        },
        startNextWeek() {
            axios.get('/api/simulation-next-weeks')
                .then(response => {
                    this.result();
                    this.fetchTeams();

                })
                .catch(error => {
                    console.log(error);
                });
        },
        startAllWeeks() {
            this.isButtonDisabled = true;
            axios.get('/api/simulation-all-weeks')
                .then(response => {
                    this.teams2 = response.data.data;
                })
                .catch(error => {
                    console.log(error);
                });
        },
        calculateChampionshipProbability(strength) {
            const totalStrength = this.teams.reduce((total, team) => total + team.strength, 0);
            const championshipProbability = (strength / totalStrength) * 100;
            return Math.round(championshipProbability);
        },
        startSimulation() {
            this.simulationStarted = !this.simulationStarted;

        },
        fetchTeams() {
            axios.get('/api/teams')
                .then(response => {
                    this.teams = response.data.data;
                })
                .catch(error => {
                    console.log(error);
                });
        },
        generateFixtures() {
            axios.get('/api/matches')
                .then(response => {
                    this.fixtures = response.data.data;
                })
                .catch(error => {
                    console.log(error);
                });
        },
        resetData() {
            axios.get('/api/reset-data')
                .then(response => {
                    location.reload();
                   console.log(response.data.data);
                })
                .catch(error => {
                    console.log(error);
                });
        }
    },
    computed: {
        groupedFixtures() {
            const groupedFixtures = {};

            this.fixtures.forEach(fixture => {
                const stage = fixture.stage;

                if (!groupedFixtures[stage]) {
                    groupedFixtures[stage] = [];
                }

                groupedFixtures[stage].push(fixture);
            });

            return groupedFixtures;
        }
    },
};
</script>
