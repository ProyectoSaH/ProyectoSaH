<?php
App::uses('AuthComponent', 'Controller/Component');
 
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
                'rule' => array('between', 5, 15), 
                'required' => true, 
                'message' => 'El Nombre De Usuario debe tener minimo de 5 a 15 caracteres'
            ),
             'unique' => array(
                'rule'    => array('isUniqueUsername'),
                'message' => 'El Nombre de usuario ingresado, ya está registrado'
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
                'rule' => array('between', 5, 15), 
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
                'rule' => array('between', 5, 15), 
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
                'message' => 'Se Requiere ingresar el rut de Usuario',
                'allowEmpty' => false
            ),
            'between' => array( 
                'rule' => array('between', 9, 12), 
                'required' => true, 
                'message' => 'El Rut Ingresado no es valido'
            ),
             'unique' => array(
                'rule'    => array('isUniqueRut'),
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
                'rule'    => array('isUniqueEmail'),
                'message' => 'El Email ya esta en uso.',
            ),
            'between' => array( 
                'rule' => array('between', 6, 60), 
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
        )
    );
     




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
            

            if($this->data[$this->alias]['rut'] == $rut['User']['id']){
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
    $r = $this->data[$this->alias]['rut'];        
      $r=strtoupper(ereg_replace('\.|,|-','',$r));
          $sub_rut=substr($r,0,strlen($r)-1);
      $sub_dv=substr($r,-1);
          $x=2;
          $s=0;
        for ( $i=strlen($sub_rut)-1;$i>=0;$i-- ){
                     if ( $x >7 ){
                             $x=2;
              }

                $s += $sub_rut[$i]*$x;
                $x++;
        }

        $dv=11-($s%11);
                if ( $dv==10 ){
                $dv='K';
        }
                if ( $dv==11 ){
                $dv='0';
        }
        if ( $dv!=$sub_dv ){ 
            return false;
        }
      
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