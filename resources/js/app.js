import Vue from 'vue'
import algoliasearch from 'algoliasearch/lite'
import InstantSearch from 'vue-instantsearch'

import VueSlider from 'vue-slider-component';
import 'vue-slider-component/theme/default.css'

window.algoliasearch = algoliasearch

Vue.use(InstantSearch)

new Vue({
    el: "#app",

    components: {
        VueSlider,
      },

    data() {
        return {
            searchClient: algoliasearch('G71R6EBOJO', 'ccfad341d5e2981e1a986b34c6adbbc6'),
        }
    },

    methods: {
        toValue(value, range) {
            return [
                value.min !== null ? value.min : range.min,
                value.max !== null ? value.max : range.max,
            ];
        },
    },
})