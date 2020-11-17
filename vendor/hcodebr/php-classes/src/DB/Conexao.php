<?php
session_start();
			//$apiURL = "/components/";
			//require 'Slim/Slim.php';
			//\Slim\Slim::registerAutoloader();
			require_once("vendor/autoload.php");
			$app = new \Slim\Slim();

			function getConnection() {
				$DBHost = "192.42.103.5"; //Database Host URL or IP Address
				$DBOraclePort = "1521"; //DB Oracle Port
				$DBName = "DBHOM00"; //if MySQL use Database Name, if Oracle use Oracle System ID (SID)
				//Connection String
				//$connectionDB = "mysql:host={$DBHost};dbname={$DBName}";
				$connectionDB = "oci:dbname=(DESCRIPTION=(ADDRESS=(HOST={$DBHost})(PROTOCOL=tcp)(PORT={$DBOraclePort}))(CONNECT_DATA=(SID={$DBName})))";
				$DBUser = "prdgemco";
				$DBPswd = "prdgemco";
				$dbh = new PDO($connectionDB, $DBUser, $DBPswd);
				$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
				return $dbh;
				
			}

?>