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
                <td>Health</td>
                <td>{{ user.health }} / {{ user.max_health }}</td>
            </tr>
            <tr>
                <td>Level</td>
                <td>{{ user.level }}</td>
            </tr>
            <tr>
                <td>Experience</td>
                <td>{{ user.experience }}</td>
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
        computed: {
            user() {
                return this.$store.state.user;
            }
        }
    }
</script>
