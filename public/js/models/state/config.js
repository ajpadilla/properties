var mapVar = 'inputMaterialsOptions'; 

var objectRow = {            
    id: "",
    code: "",
    name: "",
    area_code: "",
    country_id: "",
    created_at: "",
    updated_at: "",
    country: {
        id: "",
        name: "",
        code: "",
        language: "",
        currency_id: "",
        created_at: "",
        updated_at: "",
    }
};

var modals = {
    country_ADD_inform: false
};

var tableColumns = [
    {
        name: 'id',
        sortField: 'id',
        visible: false
    },
    {
        name: 'code',
        title: 'Código',
        sortField: 'code',
        visible: true
    },
    {
        name: 'name',
        title: 'Nombre',
        sortField: 'name',
        visible: true
    },
    {
        name: 'area_code',
        title: 'Código de area',
        sortField: 'area_code',
        visible: true
    },
    {
        name: 'country_name',
        title: 'País',
        sortField: 'country.name',
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


