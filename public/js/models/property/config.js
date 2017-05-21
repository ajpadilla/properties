var mapVar = 'inputMaterialsOptions'; 

var objectRow = {            
    id: "",
    description: '',
    number: '',
    area: '',
    number_habitants: '',
    number_pets: '',
    address: '',
    registration_number: '',
    date_construction: '',
    status: '',
    reside_property: '',
    type_contract: '',
    start_date_lease: '',
    end_date_lease: '',
    type_property_related: {
        value: "",
        text: ""
    },
    community_related: {
        value: "",
        text: ""
    },
    person_related: {
        value: "",
        text: ""
    },
    created_at: "",
    updated_at: ""
};

var modals = {
    photo_ADD_inform: false
};

var options = {
    typePropertyOptions: [],
    communityOptions: [],
    personOptions: []
};

var tableColumns = [
    {
        name: 'id',
        sortField: 'id',
        visible: false
    },
    {
        name: 'first_photo',
        title: 'Photo',
        sortField: '',
        visible: true,
        callback: 'uploadImage'
    },

    {
        name: 'number',
        title: 'Nro propiedad',
        sortField: 'number',
        visible: true
    },
    {
        name: 'address',
        title: 'Dirección',
        sortField: 'address',
        visible: true
    },
    {
        name: 'status_format',
        title: 'Estatus',
        sortField: 'status_format',
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


