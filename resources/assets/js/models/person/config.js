var mapVar = 'inputMaterialsOptions'; 

var objectRow = {            
    id: "",
    identification_number,
    business_name,
    first_name,
    second_name,
    first_surname,
    second_surname,
    home_phone,
    auxiliary_phone,
    cell_phone,
    auxiliary_cell,
    home_email,
    auxiliary_email,
    correspondence_address,
    city_correspondence,
    country_correspondence,
    office_address,
    city_office,
    country_office,
    birth_date,
    gender,
    civil_status,
    cod_labor_activity,
    admission_date,
    cancellation_date,
    status,
    country_related: {
        value: "",
        text: ""
    },
    state_related: {
        value: "",
        text: ""
    },
    city_birth_related: {
        value: "",
        text: ""
    },
    disability_related: {
        value: "",
        text: ""
    },
    educational_level_related: {
        value: "",
        text: ""
    },
    type_identification_related: {
        value: "",
        text: ""
    },
    created_at: "",
    updated_at: "",
};

var modals = {
    state_ADD_inform: false,
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
        name: 'state_name',
        title: 'País',
        sortField: 'state.name',
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


