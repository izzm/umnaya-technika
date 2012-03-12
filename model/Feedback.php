<?php
  class Feedback extends AbstractModel {
    public static $messages = array(
      'results' => array(
        0 => 'Ваше сообщение отправлено',
        1 => 'Некорректный формат номера телефона',
        2 => 'Участник не зарегистрирован в акции',
        3 => 'Неверный пароль',
        4 => 'Некорретный тип запроса или текст сообщения'
      ),
      'errors' => array(
        0 => 'БД недоступна',
        1 => 'БД недоступна',
        2 => 'БД недоступна',
        3 => 'БД недоступна'
      )
    );
  
    public static function send_from_unsigned($params) {
      $api_data = array(
        'name' => $params['name'],
        'email' => $params['email'],
        'msisdn' => self::getPhoneNumber('7' . $params['msisdn_code'] . $params['msisdn_number']),
        'id_question' => $params['id_question'],
        'message' => $params['message'],
        'file' => self::fileBase64('file')
      );
      
      $res = self::st_api_request('send_question_no_auth', $api_data);
      if($res->error == 0) {
        $res->result_message = Feedback::$messages['results']["".$res->result];
      } else {
        $res->result_message = Feedback::$messages['errors']["".$res->error];
      }
      
      return $res;
    }
    
    public static function send_from_signed($params) {
      $user_data = User::current()->getData();
    
      $api_data = array(
        'msisdn' => $user_data['msisdn'],
        'email' => $user_data['email'],
        'password' => $user_data['password'],
        'id_question' => $params['id_question'],
        'message' => $params['message'],
        'file' => self::fileBase64('file')
      );
      
      $res = self::st_api_request('send_question', $api_data);
      if($res->error == 0) {
        $res->result_message = Feedback::$messages['results']["".$res->result];
      } else {
        $res->result_message = Feedback::$messages['errors']["".$res->error];
      }
      
      return $res;
    }
  }
?>
