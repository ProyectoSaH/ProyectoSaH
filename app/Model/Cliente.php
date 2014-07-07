<?php
class Cliente extends AppModel{
	public $name = 'Cliente';
         public $validate = array(
        'name' => array(
            'nonEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => 'Se Requiere ingresar un Nombre',
                'allowEmpty' => false
            ),
            'between' => array( 
                'rule' => array('between',3, 150), 
                'required' => true, 
                'message' => 'El o los Nombres deben tener minimo de 3 a 30 caracteres'
            ),
         ),
          'rut' => array(
            'nonEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => 'Se Requiere ingresar un RUT',
                'allowEmpty' => false
            ),
            'between' => array( 
                'rule' => array('between',11, 12), 
                'required' => true, 
                'message' => 'El Rut ingresado No es valido'
            ),  
         ),   
         'surname' => array(
            'nonEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => 'Se Requiere ingresar un Nombre de Usuario',
                'allowEmpty' => false
            ),
             'between' => array( 
                'rule' => array('between',3, 150), 
                'required' => true, 
                'message' => 'El o los Apellidos deben tener minimo de 3 a 30 caracteres'
            ),
         ),    
         'date_birth' => array(
            'nonEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => 'Se Requiere ingresar una Fecha',
                'allowEmpty' => false
            ),
         ),    
         'address' => array(
            'nonEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => 'Se Requiere ingresar una Dirección',
                'allowEmpty' => false
            ),
            'between' => array( 
                'rule' => array('between',3, 60), 
                'required' => true, 
                'message' => 'La dirección debe tener un minimo de 3 a 60 caracteres'
            ), 
         ),    
             );

}
?>