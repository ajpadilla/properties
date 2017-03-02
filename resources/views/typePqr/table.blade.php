  <filter-bar></filter-bar>
  <vuetable ref="vuetable"
  api-url="{{ route('api.typePqr.index') }}"
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
    <div class="custom-actions">
      <button class="ui basic button"
      @click="onAction('view-item', props.rowData, props.rowIndex)">
      <i class="zoom icon"></i>
    </button>
    <button class="ui basic button"
    @click="onAction('edit-item', props.rowData, props.rowIndex)">
    <i class="edit icon"></i>
  </button>
  <button class="ui basic button"
  @click="onAction('delete-item', props.rowData, props.rowIndex)">
  <i class="delete icon"></i>
</button>
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
