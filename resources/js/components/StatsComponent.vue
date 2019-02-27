<template>
    <div class="col-md-6 table-responsive" >


        <h2>Stats</h2>

        <table class="table table-striped">
            <tr>
                <th>Stat</th>
                <th>Value</th>
            </tr>

            <tr>
                <td>Location</td>
                <td>{{ user.location.name }}</td>
            </tr>
            <tr>
                <td>Age</td>
                <td>{{ user.age.name }}</td>
            </tr>

            <tr>
                <td>Health

                    <a v-if="health()" href="/user/heal"><button class="btn btn-dark">Heal</button></a>

                </td>
                <td>
                    {{ user.health }} / {{ user.max_health }}
                    <progress class="nav-link" id="health" :value="user.health" :max="user.max_health"></progress>
                </td>
            </tr>
            <tr>
                <td>Energy  <a v-if="energy()" href="/user/sleep"><button class="btn btn-dark">Sleep</button></a></td>
                <td>
                    {{ user.energy }} / {{ user.max_energy }}
                    <progress class="nav-link" id="energy" :value="user.energy" :max="user.max_energy"></progress>
                </td>
            </tr>
            <tr>
                <td>Level</td>
                <td>{{ user.level }}</td>
            </tr>
            <tr>
                <td>Experience</td>
                <td>
                    {{ user.experience }} / {{user.level * 36}}
                    <progress class="nav-link" id="exp" :value="user.experience" :max="user.level * 36"></progress>
                </td>

            </tr>
            <tr>
                <td>Strength</td>
                <td>{{ user.strength }}</td>
            </tr>
            <tr>
                <td>Stamina</td>
                <td>{{ user.stamina }}</td>
            </tr>

        </table>
    </div>
</template>

<script>
    export default {
        created() {

        },
        data(){
            return {};
        },
        methods: {
            health() {
              return this.user.health !== this.user.max_health;
            },
            energy () {
                return this.user.energy !== this.user.max_energy;
            }
        },
        computed: {
            user() {
                return this.$store.state.user;
            }
        }
    }
</script>
