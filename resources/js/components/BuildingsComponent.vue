<template>
    <div class="col-md-12 table-responsive" >



    </div>
</template>

<script>
    import { mapActions, mapGetters } from 'vuex'

    export default {
        created() {
            this.getBuildings();
        },
        components: {
        },
        data(){
            return {};
        },
        methods: {
            ...mapActions([
                'getBuildings'
            ]),
            work(building) {
                axios.post('api/buildings/work', building).then((response) => {
                   console.log(response.data);
                });
            }
        },
        computed: {
            ...mapGetters([
                'buildings'
            ])
        }
    }
</script>
