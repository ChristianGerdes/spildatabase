import Vue from 'vue'
import algoliasearch from 'algoliasearch/lite'
import InstantSearch from 'vue-instantsearch'

window.algoliasearch = algoliasearch

Vue.use(InstantSearch)

new Vue({
    el: "#app",

    data() {
        return {
            searchClient: algoliasearch('G71R6EBOJO', 'ccfad341d5e2981e1a986b34c6adbbc6'),
        }
    }
})