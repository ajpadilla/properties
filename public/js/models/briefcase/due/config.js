var mapVar = 'inputMaterialsOptions'; 

var objectRow = {            
    id: "",
    name: "",
    pivot: {
        due_id: "",
        briefcase_id: "",
        amount: ""
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
        name: 'pivot.amount',
        title: 'Percent',
        sortField: 'amount',
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


