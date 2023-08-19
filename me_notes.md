  //http://localhost:8082/wp-admin/admin.php?page=stnc_map_update
yukardaki sql sorgusu kaldi 
mail gonderme kaldi 
http://localhost:8082/wp-admin/admin.php?page=stnc_building_setting  buraya mail adreslerini yazman lazim 



/wp-admin/admin.php?page=stnc_building_list  -- why doesn't it show vacant offices marked


bu projede php ile checkbox yapma ornegi var 
haritada plaindraggreas js ornegi 
simple data table ve onun ceviri ornegi var 
wordpress admin menuye codestar admin paneli hack yontemi ile ekledim 
php beatiful array
    $json_string = json_encode($options, JSON_PRETTY_PRINT);
echo   $json_string;

or 

    echo "<pre>";
    print_r($options['email_adress']); // id of the field



https://stackoverflow.com/questions/171318/how-do-i-capture-php-output-into-a-variable



How to capture the result of var_dump to a string in PHP?
    <?php
   function varDumpToString($var) {
      ob_start();
      var_dump($var);
      $result = ob_get_clean();
      return $result;
   }
   //usage
   $data = array('first', 'second', 'third');
   $result = varDumpToString($data);
   echo $result;