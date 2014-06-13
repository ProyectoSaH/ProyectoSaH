<?php
class Cita extends AppModel{
	public $name = 'Cita';
        public $validate = array(
        'title' => array(
            'nonEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => 'Se requiere un titulo',
                'allowEmpty' => false
            
            )));

}
?>