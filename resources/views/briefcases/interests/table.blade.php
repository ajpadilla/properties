  <filter-bar></filter-bar>
  <vuetable ref="vuetable"
  api-url="{{ route('api.v1.briefcases.interests.index', $briefcase->id) }}"
  :fields="columns"
  pagination-path=""
  :css="css.table"
  :sort-order="sortOrder"
  :multi-sort="true"
  detail-row-component="my-detail-row"
  :append-params="moreParams"
  @vuetable:cell-clicked="onCellClicked"
  @vuetable:pagination-data="onPaginationData"
  >
  <template slot="actions" scope="props">
    <!-- Single button -->
    <div class="btn-group">
      <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Action <span class="caret"></span>
      </button>
      <ul class="dropdown-menu">
        <li>
          <a href="#"  @click.prevent="slotActionPivot('SHOW', '{{ route('api.v1.briefcases.interests.show') }}/'+props.rowData.pivot.briefcase_id+'/'+props.rowData.pivot.interest_id+'/')">
            <i class="glyphicon glyphicon-plus"></i>Show
          </a>
        </li>
         <li>
          <a href="#"  @click.prevent="slotActionPivot('PATCH','{{ route('api.v1.briefcases.interests.show') }}/'+props.rowData.pivot.briefcase_id+'/'+props.rowData.pivot.interest_id+'/', 
          '{{ route('api.v1.briefcases.interests.update') }}/'+props.rowData.pivot.briefcase_id+'/'+props.rowData.pivot.interest_id+'/')">
            <i class="glyphicon glyphicon-plus"></i>Edit
          </a>
        </li>
        <li>
          <a href="#"  @click.prevent="slotActionPivot('DELETE','{{ route('api.v1.briefcases.interests.show') }}/'+props.rowData.pivot.briefcase_id+'/'+props.rowData.pivot.interest_id+'/', 
          '{{ route('api.v1.briefcases.interests.delete') }}/'+props.rowData.pivot.briefcase_id+'/'+props.rowData.pivot.interest_id+'/')">
            <i class="glyphicon glyphicon-plus"></i>Delete
          </a>
        </li>
      </ul>
    </div>
  </template>
</vuetable> 

<div class="vuetable-pagination">
  <vuetable-pagination-info ref="paginationInfo"
  info-class="pagination-info">
</vuetable-pagination-info>
<vuetable-pagination ref="pagination"
:css="css.pagination"
:icons="css.icons"
@vuetable-pagination:change-page="onChangePage">
</vuetable-pagination>
</div>
