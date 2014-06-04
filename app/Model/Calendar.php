<?php
class Calendar extends AppModel{
	public $name = 'Calendar';
        public $validate = array(
        'title' => array(
            'nonEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => 'Se requiere un titulo',
                'allowEmpty' => false
            
            )));

}
?>