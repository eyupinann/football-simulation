<template>
    <div>
        <h2>Şampiyonlar Ligi Grupları</h2>
        <div class="group-container">
            <button @click="resetMatches" class="action-button">Maçları Sıfırla</button>
            <button @click="startSimulation" class="action-button">Simülasyon Başlat</button>
        </div>
        <div class="group-container">
            <div class="match-box" v-for="(match, index) in matches" :key="index">
                <h3> {{ match.stage }}</h3>
                <div class="team-names">
                    {{ match.home_team }} vs {{ match.away_team }}
                </div>
                <div class="result">
                    {{ match.result.home_team_goals }} - {{ match.result.away_team_goals }}
                </div>
            </div>
            <div v-for="group in groups" :key="group.id" class="group-card">
                <h3>{{ group.group_name }}</h3>
                <div class="datatable-container">
                    <div class="tables-wrapper">
                        <div class="table-container">
                            <h4>Puan Tablosu</h4>
                            <table class="table" id="pointsTable">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th>Takım Adı</th>
                                    <th>Puan</th>
                                    <th>AG</th>
                                    <th>YG</th>
                                    <th>İhtimal</th>
                                    <th>Oyuncular</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="(team, index) in group.teams" :key="index" :class="getRowClass(index)">
                                    <td>{{ index + 1 }}</td>
                                    <td>{{ team.team_name }}</td>
                                    <td>{{ team.points }}</td>
                                    <td>{{ team.statistics.goals_scored }}</td>
                                    <td>{{ team.statistics.goals_conceded }}</td>
                                    <td>{{ calculateChampionshipProbability(team) }}%</td>
                                    <td v-for="(player, playerIndex) in team.players" :key="playerIndex">
                                        {{ player.player_name }}
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="table-container">
                            <h4>Maç Sonuçları</h4>
                            <table class="table" id="matchResultsTable">
                                <thead>
                                <tr>
                                    <th>Ev Sahibi Takım</th>
                                    <th>Sonuç</th>
                                    <th>Deplasman Takım</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="(match, index) in group.matches" :key="index">
                                    <td :class="{ 'text-green-500': match.result.home_team_goals > match.result.away_team_goals, 'text-red-500': match.result.home_team_goals < match.result.away_team_goals }">
                                        {{ match.home_team }}
                                    </td>
                                    <td :class="{ 'text-green-500': match.result.home_team_goals > match.result.away_team_goals, 'text-red-500': match.result.home_team_goals < match.result.away_team_goals }">
                                        {{ match.result.home_team_goals }} - {{ match.result.away_team_goals }}
                                    </td>
                                    <td :class="{ 'text-green-500': match.result.away_team_goals > match.result.home_team_goals, 'text-red-500': match.result.away_team_goals < match.result.home_team_goals }">
                                        {{ match.away_team }}
                                    </td>
                                </tr>
                                </tbody>

                            </table>
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
            groups: [],
            matches: [],
        };
    },
    mounted() {
        this.fetchGroups();
    },
    methods: {
        fetchGroups() {
            axios
                .get("/api/groups")
                .then((response) => {
                    this.groups = response.data.data;
                })
                .catch((error) => {
                    console.error(error);
                });
            axios.get('/api/matches')
                .then((response) => {
                    this.matches = response.data.data;
                })
                .catch((error) => {
                    console.error(error);
                });
        },
        initializeDataTables() {
            // DataTables'i başlat
            $('#pointsTable').DataTable();
            $('#matchResultsTable').DataTable();
        },
        getRowClass(index) {

            return index === 0 ? 'bg-green' : index === 1 ? 'bg-green' : index === 2 ? 'bg-red' : index === 3 ? 'bg-red' : '';

        },
        calculateChampionshipProbability(team) {
            const totalStrength = team.strength;

            const totalPoints = team.points;
            const probability = (totalStrength * totalPoints) / 100;

            return Math.round(probability) + '%';
        },
        resetMatches() {
            axios.get('/api/match-reset')
                .then(() => {
                    location.reload();
                })
                .catch((error) => {
                    location.reload();
                    console.error(error);
                });
        },
        startSimulation() {
            axios.get('/api/simulation')
                .then(() => {
                    location.reload();
                })
                .catch((error) => {
                    console.error(error);
                });
        },

    },

};
</script>

<style scoped>
.text-green-500 {
    color: #00C853;
}

.text-red-500 {
    color: #FF1744;
}

.bg-green {
    background-color: #00C853;
    color: white;
}

.bg-red {
    background-color: #FF1744;
    color: white;
}

.group-container {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
}

.group-card {
    flex: 1;
    border: 1px solid #ccc;
    padding: 10px;
    border-radius: 5px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.group-card h3 {
    font-size: 18px;
    margin-bottom: 10px;
}

.datatable-container {
    margin-top: 20px;
}

.tables-wrapper {
    display: flex;
    gap: 20px;
}

.table-container {
    flex: 1;
}

.table {
    width: 100%;
    border-collapse: collapse;
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 5px;
    margin-top: 10px;
}

.table th,
.table td {
    padding: 10px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

.table th {
    background-color: #f5f5f5;
}

.action-button {
    padding: 10px 20px;
    margin: 5px;
    background-color: #3498db;
    color: #fff;
    border: none;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.action-button:hover {
    background-color: #2980b9;
}

.match-box {
    border: 1px solid #ccc;
    padding: 10px;
    margin: 10px;
    display: inline-block;
    width: 200px;
    text-align: center;
}

.team-names {
    font-weight: bold;
}

.result {
    margin-top: 10px;
}

h3 {
    text-transform: uppercase;
}
</style>
