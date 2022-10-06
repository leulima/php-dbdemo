<?php
define( 'MYSQL_HOST', 'localhost:3306' );
define( 'MYSQL_USER', 'root' );
define( 'MYSQL_PASSWORD', 'master' );
define( 'MYSQL_DB_NAME', 'sampledb' );

//include 'db_connect.php';  //include the db_connect.php file

print "<HTML><BODY><H1>Here are the users of the sampledb created in the RDS a few seconds ago!</H1>\n";

/*
//Create and set a new connection
$get = new Connection("db1"); //"db1" is user defined in db_connect.php

//Create a query: $var->query("SQL_STATEMENT"); $var is the variable you created a connection with.
$selectusers = $get->query("SELECT * FROM users");

//Do whatever you would like with the query
print "Total Number of user records: ";

print mysql_num_rows($selectusers);

print "\n\r";

//Use built in functions to make one line queries.
$rowarray = $get->fetch($selectusers);  //fetch() fetches the associated rows.

print "<table>\n\r";  

foreach ($rowarray as $row) {
    print "<tr>\n\r";  
    foreach ($row as $col) {
        print "\t<td>$col</td>\n\r";
    }
    print "</tr>\n\r";
}

print "</table>\n\r";
*/

try {
    //$pdo = new PDO('mysql:host=' . MYSQL_HOST . ';dbname=' . MYSQL_DB_NAME, MYSQL_USER, MYSQL_PASSWORD);
    $pdo = new PDO('mysql:host=mysqldb:3306;dbname=sampledb', 'root', 'master');

    $result = $pdo->query("SELECT * FROM users");
    //$rowarray = $result->fetchAll();
    $rowarray = $result->fetchAll(PDO::FETCH_ASSOC);

    //print_r( $rowarray );

    print "<table>\n\r";  

    foreach ($rowarray as $row) {
        print "<tr>\n\r";  
        foreach ($row as $col) {
            print "\t<td>$col</td>\n\r";
        }
        print "</tr>\n\r";
    }

    print "</table>\n\r";
}
catch (PDOException $e) {
    echo 'Erro ao conectar com o MySQL: ' . $e->getMessage();
}

print "</BODY></HTML>";

?>
