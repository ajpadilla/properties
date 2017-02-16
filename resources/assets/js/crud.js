import accounting from 'accounting'
import moment from 'moment'
import Vuetable from 'vuetable-2/src/components/Vuetable'
import VuetablePagination from 'vuetable-2/src/components/VuetablePagination'
import VuetablePaginationInfo from 'vuetable-2/src/components/VuetablePaginationInfo'
import Vue from 'vue'
import VueEvents from 'vue-events'
import CustomActions from './components/CustomActions'
import DetailRow from './components/DetailRow'
import FilterBar from './components/FilterBar'

Vue.use(VueEvents)
Vue.component('custom-actions', CustomActions)
Vue.component('my-detail-row', DetailRow)
Vue.component('filter-bar', FilterBar)

const vm = new Vue({
	el:'#app',

	components: {
		Vuetable,
		VuetablePagination,
		VuetablePaginationInfo,
	},
	data:{
		fields: [
		{
			name: '__sequence',
			title: '#',
			titleClass: 'text-right',
			dataClass: 'text-right'
		},
		{
			name: '__checkbox',
			titleClass: 'text-center',
			dataClass: 'text-center',
		},
		{
			name: 'name',
			sortField: 'name',
		},
		{
			name: 'email',
			sortField: 'email'
		},
		{
			name: 'birthdate',
			sortField: 'birthdate',
			titleClass: 'text-center',
			dataClass: 'text-center',
			callback: 'formatDate|DD-MM-YYYY'
		},
		{
			name: 'nickname',
			sortField: 'nickname',
			callback: 'allcap'
		},
		{
			name: 'gender',
			sortField: 'gender',
			titleClass: 'text-center',
			dataClass: 'text-center',
			callback: 'genderLabel'
		},
		{
			name: 'salary',
			sortField: 'salary',
			titleClass: 'text-center',
			dataClass: 'text-right',
			callback: 'formatNumber'
		},
		{
			name: '__component:custom-actions',
			title: 'Actions',
			titleClass: 'text-center',
			dataClass: 'text-center'
		}
		],
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
			{ field: 'email', sortField: 'email', direction: 'asc'}
		],
		moreParams: {}
	},
	created: function () {
		console.log('Instancia de Vue 2 Lista')
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
  },
  events: {
    'filter-set' (filterText) {
      this.moreParams = {
        filter: filterText
      }
      Vue.nextTick( () => this.$refs.vuetable.refresh() )
    },
    'filter-reset' () {
      this.moreParams = {}
      Vue.nextTick( () => this.$refs.vuetable.refresh() )
    },
  }

});