<?php
class Cita extends AppModel{
	public $name = 'Cita';
        public $validate = array(
        'title' => array(
            'nonEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => 'Se Requiere ingresar un Nombre de Usuario',
                'allowEmpty' => false
            ),
            'between' => array( 
                'rule' => array('between', 3, 15), 
                'required' => true, 
                'message' => 'El Titulo debe tener minimo de 3 a 15 caracteres'
            ),
        ),
         'start' => array(
            'nonEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => 'Se Requiere ingresar un Nombre de Usuario',
                'allowEmpty' => false
            ),

             'unique' => array(
                'rule'    => 'isUnique',
                'message' => 'El Nombre de Usuario ingresado, ya está registrado'
            ),

        ),
        'end' => array(
            'nonEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => 'Se Requiere ingresar un Nombre de Usuario',
                'allowEmpty' => false
            ),

             'unique' => array(
                'rule'    => 'isUnique',
                'message' => 'El Nombre de Usuario ingresado, ya está registrado'
            ),

        ),     
       );


}
?>