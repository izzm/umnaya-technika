<?php
  class Sale extends AbstractModel {
    public static $messages = array(
      'register' => array(
        0 => 'Успешно',
        1 => 'Некорректный формат номера мобильного телефона',
        2 => 'Участник с таким номером мобильного телефона не зарегистрирован в акции',
        3 => 'Участник с таким номером мобильного телефона зарегистрирован в акции, но его пароль не совпадает с введённым',
        4 => 'У Вас не подтвержден e-mail',
        5 => 'Заполните все поля',
        7 => 'Регистрация продаж еще не началась',
        8 => 'Регистрация продаж уже закончилась'
      ),
      'errors' => array(
        0 => 'БД недоступна',
        1 => 'БД недоступна',
        2 => 'БД недоступна',
        3 => 'БД недоступна'
      ),
      'stat' => array(
        0 => 'Успешно',
        1 => 'Некорректный формат номера мобильного телефона',
        2 => 'Участник с таким номером мобильного телефона не зарегистрирован в акции',
        3 => 'Участник с таким номером мобильного телефона зарегистрирован в акции, но его пароль не совпадает с введённым',
        4 => 'У участника не подтвержден e-mail'
      )
    );
    
    public static $statuses = array(
      0 => 'продажа не подтверждена',
      1 => 'продажа подтверждена',
      2 => 'проверка продажи',
      3 => 'баллы за продажу активированы'
    );
    
    public static $categories = array(
      1 => 'Холодильники'
    );
    
    public static $goods = array(
      1 => array(
        1 => 'RL48RECIH1/BWT',
        2 => 'RL48RECSW1/BWT',
        3 => 'RL48RECTS1/BWT',
        4 => 'RL48RECVB1/BWT',
        5 => 'RL48RHEIH1/BWT',
        6 => 'RL48RSBSW1/BWT',
        7 => 'RL48RSBTS1/BWT',
        8 => 'RL50RECIH1/BWT',
        9 => 'RL50RECRS1/BWT',
        10 => 'RL50RECSW1/BWT',
        11 => 'RL50RECTB1/BWT',
        12 => 'RL50RECTS1/BWT',
        13 => 'RL50RECVB1/BWT',
        14 => 'RL50RQERS1/BWT',
        15 => 'RL50RQETS1/BWT',
        16 => 'RL52VEBIH1/BWT',
        17 => 'RL52VEBTS1/BWT',
        18 => 'RL52VEBVB1/BWT',
        19 => 'RL52VPBVB1/BWT',
        20 => 'RL55VEBIH1/BWT',
        21 => 'RL55VEBTS1/BWT',
        22 => 'RL55VEBVB1/BWT',
        23 => 'RL55VGBVB1/BWT',
        24 => 'RL55VQBRS1/BWT',
        25 => 'RL55VTEBG1/BWT',
        26 => 'RL55VTEMR1/BWT',
        27 => 'RL55VTEWG1/BWT',
        28 => 'RL56GEGSW1/BWT',
        29 => 'RL58GEGSW1/BWT',
        30 => 'RL58GEGTS1/BWT',
        31 => 'RL58GEGVB1/BWT',
        32 => 'RL58GHEIH1/BWT',
        33 => 'RL58GRERS1/BWT',
        34 => 'RL58GWEIH1/BWT',
        35 => 'RL60GZEIH1/BWT',
        36 => 'RL60GZGTS1/BWT',
        37 => 'RL60GEGTS1/BWT',
        38 => 'RL60GEGVB1/BWT',
        39 => 'RL60GJERS1/BWT',
        40 => 'RF62UBPN1/BWT',
        41 => 'RF62UBRS1/BWT',
        42 => 'RS21HDLMR1/BWT',
        43 => 'RS21HKLMR1/BWT',
        44 => 'RS21HNLBG1/BWT',
        45 => 'RS21HNLMR1/BWT',
        46 => 'RS21HNTRS1/BWT',
        47 => 'RSA1SHSL1/BWT',
        48 => 'RSA1WHMG1/BWT',
        49 => 'RSA1NHVB1/BWT',
        50 => 'RSG5FURS1/BWT',
        51 => 'RSH5SBPN1/BWT',
        52 => 'RSH5SLBG1/BWT',
        53 => 'RSH7ZNPN1/BWT',
        54 => 'RSH7ZNRS1/BWT'
      )
    );
  
    public static function register($params) {
      $api_data = array(
        'name' => $params['name'],
        'email' => $params['email'],
        'msisdn' => self::getPhoneNumber('7' . $params['msisdn_code'] . $params['msisdn_number']),
        'id_question' => $params['id_question'],
        'message' => $params['message']
      );
      
      $user_data = User::current()->getData();
    
      $api_data = array(
        'msisdn' => $user_data['msisdn'],
        'password' => $user_data['password'],
        'id_category' => $params['id_category'],
        'id_model' => $params['id_model'],
        'dt_sale' => date('Y-m-d', strtotime($params['dt_sale_d'] . '.' . 
                                             $params['dt_sale_m'] . '.' . 
                                             $params['dt_sale_y'])),
        'price' => 0+$params['price'],
        'file' => self::fileBase64('file')
      );
      
      $res = self::st_api_request('reg_sale', $api_data);
      if($res->error == 0){
        $res->result_message = Sale::$messages['register']["".$res->result];
      } else {
        $res->result_message = Sale::$messages['errors']["".$res->error];
      }
      
      return $res;
    }
    
    public static function stat($params) {
      $user_data = User::current()->getData();
    
      $api_data = array(
        'msisdn' => $user_data['msisdn'],
        'password' => $user_data['password']
      );
      
      $res = self::st_api_request('stat_sale', $api_data);
      if($res->error == 0){
        $res->result_message = Sale::$messages['register']["".$res->result];
      } else {
        $res->result_message = Sale::$messages['errors']["".$res->error];
      }
      
      foreach(Sale::$statuses as $code => $status) {
        $res->statuses->$code = $status;
      }
      
      return $res;
    }
  }
?>
