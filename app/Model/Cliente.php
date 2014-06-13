<?php
class Cliente extends AppModel{
	public $name = 'Cliente';
         public $validate = array(
        'name' => array(
            'nonEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => 'Se Requiere ingresar un Nombre de Usuario',
                'allowEmpty' => false
            ),
         ),
         'surname' => array(
            'nonEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => 'Se Requiere ingresar un Nombre de Usuario',
                'allowEmpty' => false
            ),
         ),    
         'date_birth' => array(
            'nonEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => 'Se Requiere ingresar un Nombre de Usuario',
                'allowEmpty' => false
            ),
         ),    
         'address' => array(
            'nonEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => 'Se Requiere ingresar un Nombre de Usuario',
                'allowEmpty' => false
            ),
         ),    
             );

}
?>