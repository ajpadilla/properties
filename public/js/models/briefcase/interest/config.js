var mapVar = 'inputMaterialsOptions'; 

var objectRow = {            
    id: "",
    name: "",
    pivot: {
        interest_id: "",
        briefcase_id: "",
        percent: ""
    },
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
        name: 'pivot.percent',
        title: 'Percent',
        sortField: 'percent',
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
      name: '__slot:actions',
      title: 'Actions',
      titleClass: 'center aligned',
      dataClass: 'center aligned'
    }  
];


