var objectRow = {            
    id: "",
    identification_number: "",
    supplier_regime: "",
    business_name: "",
    legal_representative: "",
    economic_activity: "",
    admission_date: "",
    address: "",
    home_phone: "",
    auxiliary_phone: "",
    cell_phone: "",
    auxiliary_cell: "",
    home_email: "",
    auxiliary_email: "",
    type_identification_related: {
        value: "",
        text: ""
    },
    created_at: "",
    updated_at: "",
};

var modals = {
    photo_ADD_inform: false
};

var options = {
    typeIdentificationOptions: [],
};


var tableColumns = [
    {
        name: 'id',
        sortField: 'id',
        visible: false
    },
    {
        name: 'identification_number',
        title: 'Identification number',
        sortField: 'identification_number',
        visible: true
    },
    {
        name: 'supplier_regime',
        title: 'supplier regime',
        sortField: 'supplier_regime',
        visible: true
    },
    {
        name: 'admission_date',
        title: 'Admission date',
        sortField: 'admission_date',
        visible: true
    },
    {
        name: 'address',
        title: 'Address',
        sortField: 'address',
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


