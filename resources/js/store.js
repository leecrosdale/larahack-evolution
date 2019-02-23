import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export const store = new Vuex.Store({
    state: {
        user: {},
        buildings: {}
    },
    mutations: {
        setUser (state, user) {
            state.user = user;
        },
        setBuildings(state, buildings) {
            state.buildings = buildings;
        }
    }
})

