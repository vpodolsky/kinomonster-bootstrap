<?php


  function insert ($name, $desc, $year, $rating, $poster, $add_date, $category_id){
     $mysqli = new mysqli('localhost', 'root', '', 'kinomoster');
     if (mysql_connect_errno()) {
       printf('Соединение не установлено');
       exit();
      }
  
      $mysqli->mysql_set_charset('utf8');

     $query = "INSERT INTO movie VALUES (null, '$name', '$desc', '$year', '$rating', '$poster', Now(), '$category_id')";
     $result = false;
     if ($mysqli -> query ($query)) {
        $result = true;
      }

     return $result;
   }


   $xml = simplexml_load_file("xml/movies.xml") or die("Error: cannot create object");
  
   echo count($xml);


     $title = null;
  // $title_orignal = null;
     $post = null;
     $rating = null;
     $year = null;

  foreach ($xml as $movie_key => $movie) {
       $name =  $movie->title_russian;
     //$title_orignal = $movie->title_russian;
       $year =  $movie->year;

     foreach ($movie->poster->big->attributes() as $poster_key => $poster) {
        $post = $poster;
      }

       if ($movie -> imdb) {
          $rating = $movie->imdb->attributes() ['rating'];
        }
      
      insert ($name, $title_orignal, $year, $rating, $poster, 1);
   
   }

  echo"<pre>";
  print_r($xml);
  echo"</pre>";


  
?>


