var mapVar = 'inputMaterialsOptions'; 

var objectRow = {            
    id: "",
    date_cut: "", 
    publication_date: "", 
    honorarium: "",
    total_capital: "",
    total_sanction: "",
    total_interest: "",
    total_debt: "",
    debt_indicator: "",
    sms_indicator: "",
    positive_balance: "",
    application_code: "",
    debt_height: "",
    property_related: {
        value: "",
        text: ""
    },
    community_related: {
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
    propertyOptions: []
};


var tableColumns = [
{
    name: 'id',
    sortField: 'id',
    visible: false
},
{
    name: 'date_cut',
    title: 'Date cut',
    sortField: 'date_cut',
    visible: true
},
{
    name: 'publication_date',
    title: 'Publication date',
    sortField: 'publication_date',
    visible: true
},
{
    name: 'total_capital',
    title: 'Total capital',
    sortField: 'total_capital',
    visible: true
},
{
    name: 'total_sanction',
    title: 'Total sanction',
    sortField: 'total_sanction',
    visible: true
},
{
    name: 'total_interest',
    title: 'Total interest',
    sortField: 'total_interest',
    visible: true
},
{
    name: 'total_debt',
    title: 'Total debt',
    sortField: 'total_debt',
    visible: true
},
{
    name: 'property_name',
    title: 'Property',
    sortField: 'property.name',
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


