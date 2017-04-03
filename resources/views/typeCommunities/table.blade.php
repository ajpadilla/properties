  <filter-bar></filter-bar>
  <vuetable ref="vuetable"
  api-url="{{ route('api.typeCommunities.index') }}"
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
    <div class="table-button-container">
        <button class="btn btn-default" @click="onClick('edit-item', props.rowData)"><i class="fa fa-edit"></i> View</button>&nbsp;&nbsp;
        <button class="btn btn-danger" @click="onClick('delete-item', props.rowData)"><i class="fa fa-remove"></i> Edit</button>&nbsp;&nbsp;
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
