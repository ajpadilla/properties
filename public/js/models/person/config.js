var mapVar = 'inputMaterialsOptions'; 

var objectRow = {            
    id: "",
    identification_number: "",
    business_name: "",
    first_name: "",
    second_name: "",
    first_surname: "",
    second_surname: "",
    home_phone: "",
    auxiliary_phone: "",
    cell_phone: "",
    auxiliary_cell: "",
    home_email: "",
    auxiliary_email: "",
    correspondence_address: "",
    city_correspondence: "",
    country_correspondence: "",
    office_address: "",
    city_office: "",
    country_office: "",
    birth_date: "",
    gender: "",
    civil_status: "",
    cod_labor_activity: "",
    admission_date: "",
    cancellation_date: "",
    status: "",
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
        name: 'identification_number',
        title: 'Nro identidad',
        sortField: 'identification_number',
        visible: true
    },
    {
        name: 'business_name',
        title: 'Razón Social',
        sortField: 'business_name',
        visible: true
    },
    {
        name: 'first_name',
        title: 'Nombre',
        sortField: 'first_name',
        visible: true
    },
    {
        name: 'first_name',
        title: 'Apellido',
        sortField: 'first_name',
        visible: true
    },
    {
        name: 'admission_date',
        title: 'Ingreso',
        sortField: 'admission_date',
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
];


