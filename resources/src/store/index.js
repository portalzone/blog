// store/index.js (Vuex store)
import { createStore } from 'vuex';

export default createStore({
  state: {
    reloadTopic: false,
  },
  mutations: {
    setReloadTopic(state, value) {
      state.reloadTopic = value;
    },
  },
  actions: {
    setReloadTopic({ commit }, value) {
      commit('setReloadTopic', value);
    },
  },
});
