global.Vue = require('vue')
window.Vue = Vue;

window.axios = require('axios');

window.axios.defaults.headers.common = {
    'X-Requested-With': 'XMLHttpRequest'
};

import accounting from 'accounting'
import moment from 'moment'
import Vuetable from 'vuetable-2/src/components/Vuetable'
import VuetablePagination from 'vuetable-2/src/components/VuetablePagination'
import VuetablePaginationInfo from 'vuetable-2/src/components/VuetablePaginationInfo'
import VueEvents from 'vue-events'

Vue.use(VueEvents);

const eventBus = new Vue();


Vue.component('custom-actions', {
	props: {
      rowData: {
        type: Object,
        required: true
      },
      rowIndex: {
        type: Number
      }
    },
	template: `<div class="custom-actions">
    				<button class="btn btn-sm" @click="itemAction('view-item', rowData, rowIndex)"><i class="glyphicon glyphicon-zoom-in"></i></button>
      				<button class="btn btn-sm" @click="itemAction('edit-item', rowData, rowIndex)"><i class="glyphicon glyphicon-pencil"></i></button>
      				<button class="btn btn-sm" @click="itemAction('delete-item', rowData, rowIndex)"><i class="glyphicon glyphicon-trash"></i></button>
    			</div>`,
    methods: {
      itemAction (action, data, index) {
     	console.log('custom-actions: ' + action, data.name, index);
      	this.$events.fire('vuetable-action', action, data);
      	this.$events.emit('init', "Spread from son to father");
      }
    }
});

Vue.component('modal', {
	template: `<transition name="modal">
			    <div class="modal-mask">
			      <div class="modal-wrapper">
			        <div class="modal-container">

			          <div class="modal-header">
			            <slot name="header">
			              default header
			            </slot>
			          </div>

			          <div class="modal-body">
			            <slot name="body">
			              default body
			            </slot>
			          </div>

			          <div class="modal-footer">
			          <button type="button" class="btn btn-default" @click='$emit("close")'>Close</button>
			            <slot name="footer">
			              default footer
			       			default footer
			              </button>
			            </slot>
			          </div>
			        </div>
			      </div>
			    </div>
			  </transition>`,
	created(){
		
	},
	events: {
      
    },
})


Vue.component('filter-bar', {
	template: `<div class="filter-bar">
    				<form class="form-inline">
        				<div class="form-group">
          					<label>Search for:</label>
         					<input type="text" v-model="filterText" class="form-control" @keyup.enter="doFilter" placeholder="name, nickname, or email">
          					<button class="btn btn-primary" @click.prevent="doFilter">Go</button>
         				 	<button class="btn" @click.prevent="resetFilter">Reset</button>
        				</div>
      				</form>
    		</div>`,
    data () {
      return {
        filterText: ''
      }
    },
    methods: {
      doFilter () {
        this.$events.fire('filter-set', this.filterText);
        console.log('desde el component filter:'+ this.filterText);
      },
      resetFilter () {
        this.filterText = ''
        this.$events.fire('filter-reset')
      }
    }

});

Vue.component('my-detail-row', {
	props: {
    	rowData: {
      	type: Object,
      	required: true
    },
    rowIndex: {
      type: Number
    }
  },
  template: `<div @click="onClick">
			    <div class="inline field">
			      <label>Name: </label>
			      <span>{{rowData.name}}</span>
			    </div>
			    <div class="inline field">
			      <label>Email: </label>
			      <span>{{rowData.email}}</span>
			    </div>
			    <div class="inline field">
			      <label>Nickname: </label>
			      <span>{{rowData.nickname}}</span>
			    </div>
			    <div class="inline field">
			      <label>Birthdate: </label>
			      <span>{{rowData.birthdate}}</span>
			    </div>
			    <div class="inline field">
			      <label>Gender: </label>
			      <span>{{rowData.gender}}</span>
			    </div>
  			</div>`,
  	methods: {
    	onClick (event) {
      		console.log('my-detail-row: on-click', event.target)
    	}
  },

});


 window.vm = new Vue({

	el:'#app',
	created: function () {
		console.log('Instancia de Vue 2 Lista', this.row, this.columns);
		this.$events.on('init', (message) => {
			console.log("Propagated action:" + message);
		});
	},
	components: 
	{
    	Vuetable,
    	VuetablePagination,
    	VuetablePaginationInfo,
  	},
	data:{
		row: objectRow,
		columns: tableColumns, 
		lastOpenModal: [],
        method: '',
        formModal: false,
        showModal: false,
        deleteModal: false,
        token: token,
        flashMessage: null,
        flashType: null,
        url: apiUrl,
        actionUrl: null,
        errorMessages:[],
		css: {
			table: {
		          tableClass: 'table table-bordered table-striped table-hover',
		          ascendingIcon: 'glyphicon glyphicon-chevron-up',
		          descendingIcon: 'glyphicon glyphicon-chevron-down'
		        },
		        pagination: {
		          wrapperClass: 'pagination',
		          activeClass: 'active',
		          disabledClass: 'disabled',
		          pageClass: 'page',
		          linkClass: 'link',
		        },
		        icons: {
		          first: 'glyphicon glyphicon-step-backward',
		          prev: 'glyphicon glyphicon-chevron-left',
		          next: 'glyphicon glyphicon-chevron-right',
		          last: 'glyphicon glyphicon-step-forward',
		        },
		},
	 	sortOrder: [
	    	{ field: fieldInitOrder, sortField: 'email', direction: 'asc'}
	    ],
	 	moreParams: {},
	},

	methods: {
	    allcap (value) {
	      return value.toUpperCase()
	    },
	    genderLabel (value) {
	      return value === 'M'
	        ? '<span class="label label-success"><i class="glyphicon glyphicon-star"></i> Male</span>'
	        : '<span class="label label-danger"><i class="glyphicon glyphicon-heart"></i> Female</span>'
	    },
	    formatNumber (value) {
	      return accounting.formatNumber(value, 2)
	    },
	    formatDate (value, fmt = 'D MMM YYYY') {
	      return (value == null)
	        ? ''
	        : moment(value, 'YYYY-MM-DD').format(fmt)
	    },
	    onPaginationData (paginationData) {
	      this.$refs.pagination.setPaginationData(paginationData)
	      this.$refs.paginationInfo.setPaginationData(paginationData)
	    },
	    onChangePage (page) {
	      this.$refs.vuetable.changePage(page)
	    },
	    onCellClicked (data, field, event) {
	      console.log('cellClicked: ', field.name)
	      this.$refs.vuetable.toggleDetailRow(data.id)
	    },
	    onAction (action, data, index) {
	    	console.log(JSON.stringify(data));
      		console.log('slot) action: ' + action, data.name, index)
    	},
    	modal (type) {
    		if (type == 'POST') {
    			this.lastOpenModal.push('formModal');
    			this.method = type;
    			this.formModal = true;
    			this.actionUrl = this.url.store;
    		} else if (type == 'PATCH'){
    			this.lastOpenModal.push('formModal');
    			this.method = type;
    			this.formModal = true;
    			this.actionUrl = this.url.update;
    		}else if (type == 'SHOW') {
    			this.lastOpenModal.push('showModal');
    			this.method = type;
    			this.showModal = true;
    		} else if (type == 'DELETE') {
    			this.lastOpenModal.push('deleteModal');
    			this.method = type;
    			this.deleteModal = true;
    			this.actionUrl = this.url.delete;
    		} else if (type == 'INFO') {
    			this.lastOpenModal.push('infoModal');
    			this.infoModal = true;
    		} else {
    			this.lastOpenModal.push(type);
    			this.localModals[type] = true;                
    		}
    	},
    	closeModal (modalName){
    		if (modalName == this.lastOpenModal[this.lastOpenModal.length - 1])
    			this.lastOpenModal.pop();

    		/*if (this.localModals[modalName] != undefined)
    			this.localModals[modalName] = false;
    		else*/
    		this.$set(this, modalName, false);
    		//this.cleanData();  
        },
        getData () {
        	axios.get(this.url.show + this.row.id)
        	.then(this.success)
        	.catch(function (error) {
        		console.log(error);
        	});
        },
        success (response){
        	if (response.data.success) {
        		this.row = response.data.data;
        	}
        	Vue.nextTick( () => this.$refs.vuetable.refresh() )
            this.flashMessage = response.data.message;
            this.flashType = 'success'; 

        },
        failed: function(error) {
            this.flashMessage = 'Some errors in sended data, please check!.';
            this.flashType = 'danger';
            if (error.response.data) {
            	this.updateErrors(error.response.data);
            }
        },
        updateErrors: function(errors) {
        	this.errorMessages = [];
        	for (var fieldAttr in errors) {
        		var errorMgs = errors[fieldAttr];
        		for (var msg in errorMgs) {
                	this.errorMessages.push(errorMgs[msg]);                       
                }
            }
        },
        submit (model = null, type = null, related = null, event)
        {

        	if (!model || model.target) 
        	{
        		this.$events.fire(this.method, this.actionUrl, this.row);
        	}else if( related ){

        	}else{

        	}
        }
  	},

	events: {
	    'filter-set' (filterText) {
        	console.log('Desde el padre:'+ filterText);

	      this.moreParams = {
	        filter: filterText
	      }
	      Vue.nextTick( () => this.$refs.vuetable.refresh() )
	    },
	    'filter-reset' () {
	      this.moreParams = {}
	      Vue.nextTick( () => this.$refs.vuetable.refresh() )
	    },
	    'vuetable-action' (action, data) {
	    	console.log('action:' + action, data);
	    	//this.row = data;
	    	this.row.id = data.id;
	    	this.getData();
	    	if (action == 'view-item') {
	    		this.modal('SHOW');
	    	} else if (action == 'edit-item') {
	    		this.modal('PATCH');
	    	} else if (action == 'delete-item') {
	    		this.modal('DELETE');
	    	}
	    },

	    'POST' (actionUrl, data){
	    	console.log('Enviando datos al servidor', actionUrl, JSON.stringify(data));
	    	axios.post(actionUrl, data)
	    	.then(this.success)
	    	.catch(this.failed);
	    },

	    'PATCH' (actionUrl, data){
	    	console.log('Actualizando datos al servidor', (actionUrl + data.id), JSON.stringify(data));
	    	var url = actionUrl + data.id;
	    	axios.patch(url, data)
	    	.then(this.success)
	    	.catch(function (error) {
	    		console.log(error);
	    	});
	    },

	    'DELETE' (actionUrl, data){
	    	console.log('Eliminando datos del servidor', (actionUrl + data.id), JSON.stringify(data));
	    	var url = actionUrl + data.id;
	    	axios.delete(url, data)
	    	.then(this.success)
	    	.catch(function (error) {
	    		console.log(error);
	    	});
	    }

  	}

});