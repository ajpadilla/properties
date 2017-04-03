var mapVar = 'inputMaterialsOptions'; 

var objectRow = {            
    id: "",
    nit: "", 
    name: "", 
    home_phone: "",
    auxiliary_phone: "",
    cell_phone: "",
    auxiliary_cell: "",
    home_email: "",
    auxiliary_email: "",
    address:"" ,
    status: "",
    opening_date: "",
    cancellation_date: "",
    reason_retiring: "",
    country_related: {
        value: "",
        text: ""
    },
    state_related: {
        value: "",
        text: ""
    },
    municipality_related: {
        value: "",
        text: ""
    },
    type_community_related: {
        value: "",
        text: ""
    },
    created_at: "",
    updated_at: "",
};

var modals = {
    photo_ADD_inform: false
};

var tableColumns = [
{
    name: 'id',
    sortField: 'id',
    visible: false
},
{
    name: 'nit',
    title: 'Nit',
    sortField: 'nit',
    visible: true
},
{
    name: 'name',
    title: 'Nombre',
    sortField: 'name',
    visible: true
},
{
    name: 'status_format',
    title: 'Estatus',
    sortField: 'status',
    visible: true
},
{
    name: 'municipality_name',
    title: 'Municipio',
    sortField: 'municipality.name',
    visible: true
},
{
    name: 'type_community_name',
    title: 'Tipo de comunidad',
    sortField: 'type_community.name',
    visible: true
},
{
    name: 'opening_date',
    title: 'Ingreso',
    sortField: 'opening_date',
    visible: true
},
{
    name: 'cancellation_date',
    title: 'Salida',
    sortField: 'cancellation_date',
    visible: true
},
{
    name: 'created_at',
    title: 'Creado en',
    sortField: 'created_at',
    visible: false
},
{
    name: 'updated_at',
    title: 'Actualizado en',
    sortField: 'updated_at',
    visible: false
},       
{
    name: '__component:custom-actions',
    title: 'Actions',
    titleClass: 'text-center',
    dataClass: 'text-center'
},
{
  name: '__slot:actions',
  title: 'Actions',
  titleClass: 'center aligned',
  dataClass: 'center aligned'
}  
];


