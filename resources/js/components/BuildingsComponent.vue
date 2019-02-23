<template>
    <div class="col-md-6 table-responsive" >


        <h2>Stats</h2>

        <table class="table table-striped">
            <tr>
                <th>Building</th>
                <th>Level</th>
                <th>Timer</th>
                <th>Work</th>
            </tr>

            <tr v-for="building in buildings">
                <td>
                    {{ building.name }}
                </td>
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
            buildings() {
                return this.$store.state.buildings;
            }
        }
    }
</script>
