<?php

  require '../auth.php';

  $return = array(
    "report" => "0",
    "shortened" => "",
  );

  if(!isset($_REQUEST["url"])) {
    $return["report"] = "Paste the link properly";
    echo json_encode($return);
    exit;
  }
  else {
    $url = rawurldecode($_REQUEST["url"]);
    
    if (filter_var($url, FILTER_VALIDATE_URL) === false) {
      $return["report"] = "Paste the link properly";
      echo json_encode($return);
      exit;
    }
    else {
      setkey:
      if(!isset($_REQUEST["key"])) {
        $key = substr(md5(rand()), 0, 7);
      }
      else {
        $key = strtolower($_REQUEST["key"]);
      }
      $key = $db->real_escape_string($key);
      $query = "SELECT Link FROM linksmap WHERE short_key = '" . $key . "'";
      $result = $db->query($query);
      if($result->num_rows != 0) {
        if(!isset($_REQUEST["key"])) goto setkey;
        $return["report"] = "Alias Already used";
        echo json_encode($return);
        exit;
      }
      
      $url = $db->real_escape_string($url);
      $query = "INSERT INTO linksmap(short_key, Link) values('" . $key . "', '" . $url . "')";
      if ($db->query($query)) {
        $return["report"] = "1";
        $return["shortened"] = $key;
        echo json_encode($return);
        exit;
      } else {
        $return["report"] = "Paste the link properly";
        echo json_encode($return);
        exit;
      }
    }
  }
?>