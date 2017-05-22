  <filter-bar></filter-bar>
  <vuetable ref="vuetable"
  api-url="{{ route('api.dues.index') }}"
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
          <a href="#"  @click.prevent="slotAction('photo_ADD_inform', props.rowData, '{{ route('api.communities.addPhoto') }}/')">
            <i class="glyphicon glyphicon-plus"></i>Add Photo
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
