const Vue = require('vue/dist/vue.js'); 
const Axios = require("axios/dist/axios.js");
const VueRouter = require("vue-router/dist/vue-router.js");
Vue.use(VueRouter);
// const AdderService = require("./services/AdderService.js");

// Define route components.
const userEntryTemplate = require("./components/entry.vue").default; // note default!
const userListTemplate = require("./components/list.vue").default;
const userMaintenanceTemplate = require("./components/maintenance.vue").default;

// Define some routes. Each map to a component
const routes = [
  { path: '/user-admin', 
  	component: userMaintenanceTemplate, 
  	props: {Axios: Axios, //pass Axios as a property to the child component (template)
  		// AdderService: AdderService
  	} 
  },
  { path: '/user-entry', 
    component: userEntryTemplate, 
    props: {Axios: Axios, //pass Axios as a property to the child component (template)
      // $http: this.$http
      // AdderService: AdderService
    } 
  },
   { path: '/user-list', 
    component: userListTemplate, 
    props: {Axios: Axios, //pass Axios as a property to the child component (template)
      // $http: this.$http
      // AdderService: AdderService
    } 
  },
  { path: '*', redirect: '/user-entry' } // set a default route to display
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
}).$mount('#appUserAdmin')



