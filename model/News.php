<?php
  class News extends AbstractModel {
    public static $messages = array(
      'errors' => array(
        0 => 'БД недоступна',
        1 => 'БД недоступна',
        2 => 'БД недоступна',
        3 => 'БД недоступна'
      ),
      'results' => array(
        0 => 'Успешно',
        1 => 'Некорректный формат номера мобильного телефона',
        2 => 'Участник с таким номером мобильного телефона не зарегистрирован в акции',
        3 => 'Участник с таким номером мобильного телефона зарегистрирован в акции, но его пароль не совпадает с введённым',
        4 => 'У участника не подтвержден e-mail',
        5 => 'Новость не существует'
      )
    );
  
    public static function last() {
      $user_data = User::current()->getData();
      
      $api_data = array(
        'msisdn' => $user_data['msisdn'],
        'password' => $user_data['password']
      );
      
      $res = self::st_api_request('latest_news', $api_data);
      if($res->error == 0){
        $res->result_message = News::$messages['results']["".$res->result];
      } else {
        $res->result_message = News::$messages['errors']["".$res->error];
      }
      
      return $res;
    }
    
    public static function archive() {
      $user_data = User::current()->getData();
      
      $api_data = array(
        'msisdn' => $user_data['msisdn'],
        'password' => $user_data['password']
      );
      
      $res = self::st_api_request('archive_news', $api_data);
      if($res->error == 0){
        $res->result_message = News::$messages['results']["".$res->result];
      } else {
        $res->result_message = News::$messages['errors']["".$res->error];
      }
      
      return $res;
    }
    
    public static function show($id_news) {
      $user_data = User::current()->getData();
      
      $api_data = array(
        'msisdn' => $user_data['msisdn'],
        'password' => $user_data['password'],
        'id_news' => 0+$id_news
      );
      
      $res = self::st_api_request('news', $api_data);
      if($res->error == 0){
        $res->result_message = News::$messages['results']["".$res->result];
      } else {
        $res->result_message = News::$messages['errors']["".$res->error];
      }
      
      return $res;
    }
  }
?>
