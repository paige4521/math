<?php
	require_once 'config.php';
	try {
		$dsn = "pgsql:host=$host;port=5432;dbname=$db;";
		// make a database connection
		$pdo = new PDO($dsn, $user, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);	

		// if ($pdo) {
		// 	echo "Connected to the $db database successfully!";
		// }
	} catch (PDOException $e) {
		die($e->getMessage());
} 
	// finally {
	// 	if ($pdo) {
	// 		$pdo = null;
	// }
// }


function find_user_by_email(\PDO $pdo, string $keyword): array
{
    $sql = 'SELECT count(*) FROM "Users" WHERE user_email = :email';
	$statement = $pdo->prepare($sql);
    $statement->execute([':email' => $keyword]);
    return  $statement->fetchAll(PDO::FETCH_OBJ);
}

function get_user_by_email(\PDO $pdo, string $email){
	$sql = 'SELECT * FROM "Users" WHERE user_email = :email';
	$statement = $pdo->prepare($sql);
	$statement->execute(['email' => $email]);
	return $statement->fetchAll(PDO::FETCH_OBJ);
}