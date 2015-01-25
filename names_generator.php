<?php 
if (!$_POST) {
  header('Location: index.php');    
}
$names_men = $_POST['men_names'];
$names_women = $_POST['women_names'];

$array_men = explode("\n", $names_men);
$names_arr_men = explode("\n", $names_men);
$array_women = explode("\n", $names_women);
$names_arr_women = explode("\n", $names_women);

array_splice($array_men, $_POST['number_men']);
array_splice($names_arr_men, $_POST['number_men']);
array_splice($array_women, $_POST['number_women']);
array_splice($names_arr_women, $_POST['number_women']);

$array = array_merge($names_arr_men, $names_arr_women);

$friends1_html = array();
foreach ($array as $key => $name) {

  $user_name = $name;//substr($name, 0, -4);
  list($first_name, $last_name) = explode(' ', $name);
  $email = strtolower(substr($first_name, 0, 1)) . '_' . strtolower($last_name) . '@mail.com<br>'; 
  $id = strtolower(substr(trim($first_name), 0, 1)) . strtolower(trim($last_name)); 
  //echo $id . '<br>';
  $sha = sha1($user_name);
  $date = date("Y-m-d", rand(strtotime($_POST['start_date']), strtotime($_POST['end_date'])));
  $tel = rand(100000, 999999);

  $title = 'Mr.';
  $sex = 'men';
  if ($key > (count($array_men)-1)) {
    $title = 'Mrs.';
    $sex = 'women';
    $key -= count($array_men)-1;
  }

  $xml = '
<html>
<head>
  <title>FOAF of ' . $first_name . ' ' . $last_name . '</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <a id="new_generation" href="../index.php">Back to generate page</a>
    <div class="foaf_person">
  <?xml version="1.0"?>
  <!-- So what the heck is this?  Its a Friend of a Friend document -->
  <rdf:RDF
        xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
        xmlns:rdfs="http://www.w3.org/2000/01/rdf-schema#"
        xmlns:foaf="http://xmlns.com/foaf/0.1/"
        xmlns:dc="http://purl.org/dc/elements/1.1/"
        xmlns:dcterms="http://purl.org/dc/terms" 
        >

    <foaf:Person rdf:ID="' . $id . '">
      <span class="profile_img">
        <foaf:img rdf:resource="http://api.randomuser.me/portraits/med/' . $sex . '/' . $key . '.jpg"><img src="http://api.randomuser.me/portraits/med/' . $sex . '/' . $key . '.jpg"/></foaf:img>  
      </span>
      <span class="profile_info">
        <foaf:name>Name: "' . $first_name . ' ' . $last_name . '"</foaf:name><br>
        <foaf:title>Title: ' . $title . '</foaf:title><br>
        <foaf:firstName>First name: ' . $first_name . '</foaf:firstName><br>
        <foaf:surname>Surname: ' . $last_name . '</foaf:surname><br>
        <foaf:mbox rdf:resource="mailto:' . $email . '">Email: ' . $email . '</foaf:mbox>
        <foaf:nick>Nickname: ' . $first_name . '</foaf:nick><br>
        <foaf:mbox_sha1sum>Sha unique key: ' . $sha . '</foaf:mbox_sha1sum> <!-- my main address --><br>
        <foaf:phone rdf:resource="tel:' . $_POST['tel_code'] . $tel . '">Tel: ' . $_POST['tel_code'] . $tel . '</foaf:phone><br>
        <dcterms:issued>Birth date: ' . $date . '</dcterms:issued><br>
      </span>
      <br>
      <p>Friends: <br>
  ';

  $friends = array();
  foreach ($array as $friend) {
    if ($friend != $name) {
      list($first_name1, $last_name1) = explode(' ', $friend);
      $id1 = strtolower(substr($first_name1, 0, 1)) . strtolower($last_name1);
      $friends[] = '<a href="./' . $id1 . '.html"><foaf:knows rdf:resource="#' . $id1 . '">' . $first_name1 . ' ' . trim($last_name1) . '</foaf:knows></a>, ';
    }
  }
  shuffle($friends);
  $xml .= implode('', $friends);
   $xml .= '
      </p>
    </foaf:Person>
    <br>
  ';
  $xml .= 
  '
    <!-- People -->
    <!-- These are linked to me via the use of the rdf:ID inside foaf:knows elements up in my foaf:Person -->
  ';
  $friends1 = array();
  foreach ($array as $key2 => $friend) {
    if ($friend != $name) {
      $user_name2 = $friend;
      list($first_name, $last_name) = explode(' ', $friend);
      $id2 = strtolower(substr($first_name, 0, 1)) . strtolower($last_name);
      $sha2 = sha1($user_name2);
      $sex = 'men';
      if ($key2 > count($array_men)-1) {
        $sex = 'women';
        $key2 -= count($array_men)-1;
      }
      $friends1[] = '
  <span class="friend">
    <foaf:Person rdf:ID="' . $id2 . '">
      <span class="profile_img_friend">
        <foaf:img rdf:resource="http://api.randomuser.me/portraits/thumb/' . $sex . '/' . $key2 . '.jpg"><img src="http://api.randomuser.me/portraits/thumb/' . $sex . '/' . $key2 . '.jpg"/></foaf:img>  
      </span>
      <span class="profile_info_friend">
        <foaf:name>Name: ' . $first_name . ' ' . $last_name .  '</foaf:name><br>
        <foaf:mbox_sha1sum>sha1: ' . $sha2 . '</foaf:mbox_sha1sum><br>
        <rdfs:seeAlso rdf:resource="./' . $id2 . 'foaf.rdf" ><a href="./' . $id2 . '.html">FOAF of ' . $first_name . ' ' . $last_name . '</a></rdfs:seeAlso>
      </span>
    </foaf:Person>
  </span>
  ';
  $friends1_html[$id2] = '
  <span class="friend">
    <foaf:Person rdf:ID="' . $id2 . '">
      <span class="profile_img_friend">
        <foaf:img rdf:resource="http://api.randomuser.me/portraits/thumb/' . $sex . '/' . $key2 . '.jpg"><img src="http://api.randomuser.me/portraits/thumb/' . $sex . '/' . $key2 . '.jpg"/></foaf:img>  
      </span>
      <span class="profile_info_friend">
        <foaf:name>Name: ' . $first_name . ' ' . $last_name .  '</foaf:name><br>
        <foaf:mbox_sha1sum>sha1: ' . $sha2 . '</foaf:mbox_sha1sum><br>
        <rdfs:seeAlso rdf:resource="./' . $id2 . 'foaf.rdf" ><a href="./foaf/' . $id2 . '.html">FOAF of ' . $first_name . ' ' . $last_name . '</a></rdfs:seeAlso>
      </span>
    </foaf:Person>
  </span>
  ';
    }
  }
  shuffle($friends1);

  $xml .= implode('', $friends1);
  $xml .= '

  </rdf:RDF>
  </div>
</body>
</html>
';

file_put_contents('C:/xampp/htdocs/xml/foaf/' . $id . '.html', $xml);
}

shuffle($friends1_html);
$html = implode('', $friends1_html);

echo $html = '
<html>
    <head>
      <title>List of all</title>
      <link rel="stylesheet" type="text/css" href="./foaf/style.css">
    </head>
    <body>
    <h1>List with all generated persons: </h1>
    <a style="position: absolute; right: 8px; top: 44px;" id="new_generation" href="./index.php">Back to generate page</a>
  ' . $html .
  '</body>
</html>';
?>