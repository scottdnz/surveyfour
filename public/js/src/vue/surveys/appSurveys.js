const Vue = require('vue/dist/vue.js'); 
const Axios = require("axios/dist/axios.js");
const VueRouter = require("vue-router/dist/vue-router.js");
Vue.use(VueRouter);
// const AdderService = require("./services/AdderService.js");

// Define route components.
const surveyEntryTemplate = require("./components/entry.vue").default; // note default!
const surveyListTemplate = require("./components/list.vue").default;

// Define some routes. Each map to a component
const routes = [
  { path: '/survey-entry', 
  	component: surveyEntryTemplate, 
  	props: {Axios: Axios, //pass Axios as a property to the child component (template)
  		// AdderService: AdderService
  	} 
  },
  { path: '/survey-list', 
    component: surveyListTemplate, 
    props: {Axios: Axios, //pass Axios as a property to the child component (template)
      // AdderService: AdderService
    } 
  },
  { path: '*', redirect: '/survey-entry' } // set a default route to display
]

// Create the router instance and pass the `routes` option
const router = new VueRouter({
  routes // short for `routes: routes`
})

// Create and mount the root instance.
const app = new Vue({
	router
	// el: "#app",
	// components: {
	//     'AdderService': AdderService,
	//     'fooTemplate': fooTemplate
	//   },
}).$mount('#appSurveys')



