<?php
App::uses('AuthComponent', 'Controller/Component');
 
// 1234567 : 79c7919b65a06801bb77c060b1b9f2ab64439cb5
class User extends AppModel {
     
    public $avatarUploadDir = 'img/avatars';
     
    public $validate = array(
        'username' => array(
            'nonEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => 'Se Requiere ingresar un Nombre de Usuario',
                'allowEmpty' => false
            ),
            'between' => array( 
                'rule' => array('between', 3, 150), 
                'required' => true, 
                'message' => 'El Nombre De Usuario debe tener minimo de 5 a 15 caracteres'
            ),
             'unique' => array(
                'rule'    => 'isUnique',
                'message' => 'El Nombre de UAsuario ingresado, ya está registrado'
            ),
            'alphaNumericDashUnderscore' => array(
                'rule'    => array('alphaNumericDashUnderscore'),
                'message' => 'Username can only be letters, numbers and underscores'
            ),
        ),
        'name' => array(
            'nonEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => 'Se Requiere ingresar Nombres ',
                'allowEmpty' => false
            ),
            'between' => array( 
                'rule' => array('between', 3, 150 ), 
                'required' => true, 
                'message' => 'Los Nombres deben tener minimo de 5 a 15 caracteres en total'
            ),
            'alphaNumericDashUnderscore' => array(
                'rule'    => array('alphaNumericDashUnderscore'),
                'message' => 'Username can only be letters, numbers and underscores'
            ),
        ),
        'number' => array(
            'nonEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => 'Se Requiere ingresar Nombres ',
                'allowEmpty' => false
            ),
            'between' => array( 
                'rule' => array('between', 3, 150 ), 
                'required' => true, 
                'message' => 'Los Nombres deben tener minimo de 5 a 15 caracteres en total'
            ),
            'alphaNumericDashUnderscore' => array(
                'rule'    => array('alphaNumericDashUnderscore'),
                'message' => 'Username can only be letters, numbers and underscores'
            ),
        ),
        'address' => array(
            'nonEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => 'Se Requiere ingresar Nombres ',
                'allowEmpty' => false
            ),
            'between' => array( 
                'rule' => array('between', 3, 150 ), 
                'required' => true, 
                'message' => 'Los Nombres deben tener minimo de 5 a 15 caracteres en total'
            ),
            'alphaNumericDashUnderscore' => array(
                'rule'    => array('alphaNumericDashUnderscore'),
                'message' => 'Username can only be letters, numbers and underscores'
            ),
        ),
        'surname' => array(
            'nonEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => 'Se Requiere ingresar Apellidos',
                'allowEmpty' => false
            ),
            'between' => array( 
                'rule' => array('between', 3, 150), 
                'required' => true, 
                'message' => 'Los Apellidos deben tener minimo de 5 a 15 caracteres en total'
            ),
            'alphaNumericDashUnderscore' => array(
                'rule'    => array('alphaNumericDashUnderscore'),
                'message' => 'Username can only be letters, numbers and underscores'
            ),
        ),
        'date_birth' => array(
            'nonEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => 'Se Requiere ingresar un Nombre de Usuario',
                'allowEmpty' => false
            )

        ),
        'rut' => array(
            'nonEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => 'Se Requiere ingresar el Rut de Usuario',
                'allowEmpty' => false
            ),
            'between' => array( 
                'rule' => array('between', 9, 12), 
                'required' => true, 
                'message' => 'El Rut Ingresado no es valido'
            ),
             'unique' => array(
                'rule'    => 'isUnique',
                'message' => 'El rut ingresado, ya está registrado'
            ),

        ),
        'password' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A password is required'
            ),
            'min_length' => array(
                'rule' => array('minLength', '6'),  
                'message' => 'Contraseña debe tener a lo menos 6 caracteres'
            )
        ),
         'password_confirm' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Please confirm your password'
            ),
             'equaltofield' => array(
                'rule' => array('equaltofield','password'),
                'message' => 'Both passwords must match.'
            )
        ),
         
        'email' => array(
            'required' => array(
                'rule' => array('email', true),    
                'message' => 'El email debe ser valido.'   
            ),
             'unique' => array(
                'rule'    => 'isUnique',
                'message' => 'El Email ya esta en uso.',
            ),
            'between' => array( 
                'rule' => array('between', 3, 60), 
                'message' => 'Usernames must be between 6 to 60 characters'
            )
        ),
        'role' => array(
            'valid' => array(
                'rule' => array('inList', array('admin', 'empleado')),
                'message' => 'Please enter a valid role',
                'allowEmpty' => false
            )
        ),
         'password_update' => array(
            'min_length' => array(
                'rule' => array('minLength', '6'),   
                'message' => 'Contraseña debe tener a lo menos 6 caracteres',
                'allowEmpty' => true,
                'required' => false
            )
        ),
        'password_confirm_update' => array(
             'equaltofield' => array(
                'rule' => array('equaltofield','password_update'),
                'message' => 'Both passwords must match.',
                'required' => false,
            )
        ),
        'new_password' => array(
        'rule' => 'checkCurrentPassword',
        'message' => 'La contraseña ingresada, no coincide con la anterior.'
    ),
    );
    
    public function checkCurrentPassword($data) {
    $this->id = AuthComponent::user('id');
    $password = $this->field('password');
    return(AuthComponent::password($data['new_password']) == $password);
}
    function isUniqueUsername($check) {
 
        $username = $this->find(
            'first',
            array(
                'fields' => array(
                    'User.id',
                    'User.username'
                ),
                'conditions' => array(
                    'User.username' => $check['username']
                )
            )
        );
 
        if(!empty($username)){
            if($this->data[$this->alias]['id'] == $username['User']['id']){
                return true; 
            }else{
                return false; 
            }
        }else{
            return true; 
        }
    }
 
    /**
     * Before isUniqueEmail
     * @param array $options
     * @return boolean
     */
    function isUniqueEmail($check) {
 
        $email = $this->find(
            'first',
            array(
                'fields' => array(
                    'User.id'
                ),
                'conditions' => array(
                    'User.email' => $check['email']
                )
            )
        );
 
        if(!empty($email)){
            if($this->data[$this->alias]['id'] == $email['User']['id']){
                return true; 
            }else{
                return false; 
            }
        }else{
            return true; 
        }
    }

    function isUniqueRut($check) {
 
        $rut = $this->find(
            'first',
            array(
                'fields' => array(
                    'User.id'
                ),
                'conditions' => array(
                    'User.rut' => $check['rut']
                )
            )
        );
 
        if(!empty($rut)){
            

            if($this->data[$this->alias]['id'] == $rut['User']['id']){
                return true; 
            }else{
                return false; 
            }
        }else{
            return true; 
        }
    }
     
    public function alphaNumericDashUnderscore($check) {
        // $data array is passed using the form field name as the key
        // have to extract the value to make the function generic
        $value = array_values($check);
        $value = $value[0];
 
        return preg_match('/^[a-zA-Z0-9_ \-]*$/', $value);
    }
     
    public function equaltofield($check,$otherfield) 
    { 
        //get name of field 
        $fname = ''; 
        foreach ($check as $key => $value){ 
            $fname = $key; 
            break; 
        } 
        return $this->data[$this->name][$otherfield] === $this->data[$this->name][$fname]; 
    } 
 
    /**
     * Before Save
     * @param array $options
     * @return boolean
     */
    
     public function beforeSave($options = array()) {
        // hash our password
     
        if (isset($this->data[$this->alias]['password'])) {
            $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
        }
         
        // if we get a new password, hash it
        if (isset($this->data[$this->alias]['password_update']) && !empty($this->data[$this->alias]['password_update'])) {
            $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password_update']);
        }
     
        // fallback to our parent
        return parent::beforeSave($options);
    }
 
}