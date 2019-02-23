<template>
    <div class="col-md-6 table-responsive" >


        <div class="col-md-6">
            <h2>Supply</h2>

            <table class="table table-striped">
                <tr>
                    <th>Supply</th>
                    <th>Value</th>
                </tr>
                <tr v-for="supply in user.supplies">
                    <td>
                        {{ supply.supply.name }}
                    </td>
                    <td>
                        {{ supply.amount }}
                    </td>
                </tr>
            </table>
        </div>
    </div>
</template>

<script>
    export default {
        computed: {
            data(){
                return {};
            },
            user() {
                return this.$store.state.user;
            }
        }
    }
</script>
