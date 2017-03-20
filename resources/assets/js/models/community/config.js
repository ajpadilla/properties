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
    municipality_id: "",
    type_community_id: "",
    created_at: "",
    updated_at: "",
};

var modals = {
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
        visible: false
    },
    {
        name: 'address',
        title: 'Dirección',
        sortField: 'address',
        visible: true
    },
    {
        name: 'status',
        title: 'Estatus',
        sortField: 'status',
        visible: true
    },
    {
        name: 'municipality_name',
        title: 'Moneda',
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
];


