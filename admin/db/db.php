<?php
	require_once 'config.php';
	try {
		
		$db = parse_url(getenv("DATABASE_URL"));

		$pdo = new PDO("pgsql:" . sprintf(
		    "host=%s;port=%s;user=%s;password=%s;dbname=%s",
		    $db["ec2-18-215-44-132.compute-1.amazonaws.com"],
		    $db["5432"],
		    $db["llfkqcwukflktc"],
		    $db["35af897fd853f3006d773a02b34474c956a0ad96767870d8fbe6e1b59ea9afad
URI"],
		    ltrim($db["de3tpd5vt7fb0b"], "/")
		));
		
		
		
// 		$dsn = "pgsql:host=".$host.";port=".$port.";dbname=".$db.";user=".$user.";password=".$password;
		// make a database connection
// 		$pdo = new PDO($dsn, $user, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);	

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
