var mapVar = 'inputMaterialsOptions'; 

var objectRow = {            
    id: "",
    name: "",
    created_at: "",
    updated_at: ""
};

var tableColumns = [
    {
        name: 'id',
        sortField: 'id',
        visible: false
    },
    {
        name: 'name',
        title: 'Nombre',
        sortField: 'name',
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

