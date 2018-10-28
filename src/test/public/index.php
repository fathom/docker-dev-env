<?php
echo 'php version ' . phpversion() . '<br>' . PHP_EOL;

echo '<h1>Extensions</h1>';
echo '<pre>';
print_r(get_loaded_extensions());
echo '</pre>';

echo '<h1>Memcached</h1>';
$memcached = new Memcached();
$memcached->addServer(memcached, 11211);
$name = 'testkey';
$ttl = 10;
$data = sha1(time());
$memcached->set($name, $data, $ttl);
echo date('His') . ': key "' . $name . '" set to "' . $data . '" with ttl ' . $ttl . '<br>' . PHP_EOL;
$res = $memcached->get($name);
echo date('His') . ': key "' . $name . '" data is "' . $res . '" and that is ' . ($res == $data ? 'a match' : 'not a match')  . '<br>' . PHP_EOL;

echo '<h1>MariaDB</h1>';
$pdo = new \PDO('mysql:host=mariadb', 'root', '123456');

echo 'SHOW DATABASES<br>';
$stmt = $pdo->query('SHOW DATABASES');

while ($row = $stmt->fetch())
{
    echo '<pre>';
	print_r($row);
	echo '</pre>';
}

phpinfo();