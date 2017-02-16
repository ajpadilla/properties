<!DOCTYPE html>
<html>
<head>
  <title>Angular QuickStart</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="/css/vue-styles.css">
</script>
</head>

<body>
 <div id="app">
   <div>
    <filter-bar></filter-bar>
    <vuetable ref="vuetable"
      api-url="http://vuetable.ratiw.net/api/users"
      :fields="fields"
      pagination-path=""
      :css="css.table"
      :sort-order="sortOrder"
      :multi-sort="true"
      detail-row-component="my-detail-row"
      :append-params="moreParams"
      @vuetable:cell-clicked="onCellClicked"
      @vuetable:pagination-data="onPaginationData"
    ></vuetable> 
    <div class="vuetable-pagination">
      <vuetable-pagination-info ref="paginationInfo"
        info-class="pagination-info"
      ></vuetable-pagination-info>
      <vuetable-pagination ref="pagination"
        :css="css.pagination"
        :icons="css.icons"
        @vuetable-pagination:change-page="onChangePage"
      ></vuetable-pagination>
    </div>
  </div>
 </div>
</body>
</html>
