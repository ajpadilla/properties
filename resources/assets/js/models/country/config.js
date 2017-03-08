var mapVar = 'inputMaterialsOptions'; 

var objectRow = {            
    id: "",
    name: "",
    code: "",
    language: "",
    currency_id: "",
    created_at: "",
    updated_at: "",
    currency: {
        id: "",
        name: ""
    }
};

var modals = {
    currency_ADD_inform: false
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
        visible: false
    },
    {
        name: 'name',
        title: 'Nombre',
        sortField: 'name',
        visible: true
    },
    {
        name: 'language',
        title: 'Idioma',
        sortField: 'language',
        visible: true
    },
    {
        name: 'currency_name',
        title: 'Moneda',
        sortField: 'currency.name',
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


