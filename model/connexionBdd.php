<!--<?php
/*class Connection extends PDO
{
    public function __construct()
    {
        parent::__construct("mysql:host=;dbname=", '', '',
		array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        $this->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
		    $this->setAttribute(PDO::FETCH_ASSOC);
    }
}
*/?>-->

<?php

$o_pdo = get_connexion();

function get_connexion() {
  $dbName = '';
  $dbPort = '';
  $dbHost = '';
  $dbUser = '';
  $dbPass = '';

  $dsn = "mysql:dbname=" . $dbName . ";port=" . $dbPort . ";host=" . $dbHost;
  $a_attribute = array(PDO::ATTR_PERSISTENT => false, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");

  try {
    $o_pdo = new PDO($dsn, $dbUser, $dbPass, $a_attribute);
    $o_pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $o_pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $o_pdo;
  } catch (PDOException $e) {
    echo "<br/><h1>DATABASE ERROR</h1>";
    exit;
  }
}

/**
 * Requête : SELECT
 * return : Array
 */
function get_select($sql, $a_datas = NULL) {
  $a_query = array('SQL' => $sql, "A_DATAS" => stripslashes_datas($a_datas));
  try {
    global $o_pdo;
    $o_prepare = $o_pdo->prepare($sql);
    $o_prepare->execute($a_datas);
    return $o_prepare->fetchAll();
  } catch (Exception $e) {
    echo "<pre><br>" . $e->getMessage() . "<br>";
    print_r($a_query);
    echo "</pre>";
    return false;
  }
}

/**
 * Requete UPDATE, DELETE
 *
 * @param string $sql
 * @param array  $a_data
 * @param bool   $stripslashes
 *
 * @return int
 */
function set_exec($sql, $a_datas = NULL) {
  $a_datas = is_array($a_datas) ? $a_datas : array();
  $a_query = array('SQL' => $sql, "A_DATA" => stripslashes_datas($a_datas));
  try {
    global $o_pdo;
    $o_prepare = $o_pdo->prepare($sql);
    foreach ($a_datas as $champ => $val) {
      if ($val == 'NULL') {
        $a_datas[$champ] = null;
        $o_prepare->bindParam($champ, $a_datas[$champ], PDO::PARAM_NULL);
      }
    }
    return $o_prepare->execute($a_datas);
  } catch (Exception $e) {
    echo "<pre><br>" . $e->getMessage() . "<br>";
    print_r($a_query);
    echo "</pre>";
    return false;
  }
}

/**
 * Retourne la valeur sans les Slashes
 * @param string $var
 */
function stripslashes_datas($var) {
  if (is_array($var)) {
    $return = array();
    foreach ($var as $K => $V) {
      $return[$K] = stripslashes_datas($V);
    }
  } else {
    $return = stripslashes($var);
  }
  return $return;
}
