<?php
  class User extends AbstractModel {
    protected $fields = array('surname', 'name', 'patronymic', 'sex',
                              'birthday', 'msisdn', 'email', 'id_outlet', 
                              'category');
                              
    public static $messages = array(
      'results' => array(
        0 => 'Участник успешно зарегистрирован',
        1 => 'Номер телефона уже зарегистрирован в акции',
        2 => 'Email уже зарегистрирован в акции',
        3 => 'Не все поля заполнены',
        101 => 'Неверно указан код с картинки',
        102 => 'Вы должны принять правила'
      ),
      'errors' => array(
        0 => 'БД недоступна',
        1 => 'БД недоступна',
        2 => 'БД недоступна',
        3 => 'БД недоступна'
      ),
      'login' => array(
        0 => 'Вы успешно вошли',
        1 => 'Некорректный формат номера телефона',
        2 => 'Участник с таким номером не зарегистрирован',
        3 => 'Неверный пароль',
        4 => 'Email не активирован'
      ),
      'fields' => array(
        'surname'    => array(0 => 'Поле обязательно для заполнения'),
        'name'       => array(0 => 'Поле обязательно для заполнения'),
        'patronymic' => array(0 => 'Поле обязательно для заполнения'),
        'sex'        => array(0 => 'Поле обязательно для заполнения'),
        'birthday'   => array(0 => 'Поле обязательно для заполнения'),
        'msisdn'     => array(0 => 'Поле обязательно для заполнения'),
        'email'      => array(0 => 'Поле обязательно для заполнения'),
        'id_outlet'  => array(0 => 'Поле обязательно для заполнения'), 
        'category'   => array(0 => 'Поле обязательно для заполнения')
      )
    );
    
    public function register($params) {
      $params['category'] = array();
      if(isset($params['id_category'])) {
        foreach($params['id_category'] as $id_category) {
          $params['category'][] = array('__NAME__' => 'id_category', '__VALUE__' => $id_category);
        }
        unset($params['id_category']);
      }
      
      $params['birthday'] = date('Y-m-d', strtotime($params['birthday']));
      $params['msisdn'] = self::getPhoneNumber($params['msisdn']);
    
      if($this->validate($params)) {
        $res = $this->api_request('user_reg', $params);
      } else {
        $res = false;
      }
      
      return $this->attachMessages($res);
    } 
    
    public static function emailActivate($ukey) {
      $params = array('ukey' => $ukey);
      $res = self::st_api_request('user_email_activate', $params);
      
      return $res->result;
    }
    
    public static function loggedIn() {
      return ($_SESSION['user'] != null);
    }
    
    public static function current() {
      return $_SESSION['user'];
    }
    
    public static function login($params) {
      $new_params = array('msisdn' => self::getPhoneNumber($params['msisdn']), 
                          'password' => $params['password']);
                          
      $res = self::st_api_request('user_auth', $new_params);
      $_SESSION['msisdn'] = $params['msisdn'];
      
      if($res->error == 0) {
        if($res->result == 0) {
          $flash = 'notice';
        } else {
          $flash = 'error';
        }
        $scope = 'login';
        $value = "".$res->result;
      } else {
        $scope = 'errors';
        $flash = 'error';
        $value = "".$res->error;
      }
      Application::getInstance()->setFlash($flash, User::$messages[$scope][$value]);
      
      $success = ($res->result == 0 && $res->error == 0);
      if($success) {
        $user_data = array();
        foreach($res->user_data->children() as $child) {
          $user_data[$child->getName()] = "".$child;
        }
        $user_data['points'] = 0+$res->points;
        $user_data['active_points'] = 0+$res->active_points;
        
        $_SESSION['user'] = new User($user_data);
      }
      
      return $success;
    }
    
    public static function logout() {
      $_SESSION['user'] = null;
      $_SESSION['msisdn'] = null;
      
      return true;
    }
    
    private static function getPhoneNumber($phone, $city = false) {
	    $fphone = preg_replace('/[^\\d]/', '', $phone);
	    if (strlen($fphone) == 11) {
		    if ($fphone[0] == '8') {
			    $fphone[0] = '7';
		    } elseif ($fphone[0] != '7') {
			    return null;
		    }
		    return $fphone;
	    } elseif (strlen($fphone) == 10) {
		    return '7'.$fphone;	
	    } elseif(strlen($fphone) == 12) {
		    return $fphone;	
	    } elseif(strlen($fphone) == 7 && $city) {
		    //var_dump($fphone);
		    return '7495'.$fphone;
	    }
	    return null;
    }
    
    private function attachMessages($result) {
      $result->result_message = User::$messages['results']["".$result->result];
      if(isset($result->fields)) {
        foreach($result->fields->children() as $f) {
          $field = $f->getName();
          $error = 0;
          
          if(isset(self::$messages['fields'][$field])) {
            if(!isset(self::$messages['fields'][$field][$error])) {
              $error = 0;
            }
            
            $message = self::$messages['fields'][$field][$error];
          } else {
            $message = "";
          }
          
          $field_message = $field . '_message';
          
          $result->fields[$field_message] = $message;
        }
      }
        
      return $result;
    }
  }
?>
