#!/usr/bin/php
<?php
error_reporting(0);

if (!isset($argv[3]))
	{
	echo "
\033[1;34m[*]\033[0m Simples port-scanner criador por Nesk
\033[1;34m[*]\033[0m Usage: $argv[0] <host|ip> <porta-inicial> <porta-final>

";
	exit;
	}

if (isset($argv[4]))
	{
	echo "
\033[1;34m[*]\033[0m Simples port-scanner criador por Nesk
\033[1;34m[*]\033[0m Usage: $argv[0] <host|ip> <porta-inicial> <porta-final>

";
	exit;
	}

if ($argv[2] > $argv[3])
	{
	echo "
\033[1;31m[-]\033[0m A porta inicial nao pode ser maior que a porta final
";
	exit;
	}

if ($argv[3] > 65535)
	{
	echo "
\033[1;31m[-]\033[0m O limite de portas e 65535
";
	exit;
	}

echo "
\033[1;31m[-]\033[0m Alvo: $argv[1]

";

for ($port = $argv[2]; $port <= $argv[3]; $port++)
	{
	$timeout = 1;
	$fp = fsockopen("$argv[1]", $port, $errnum, $errstr, $timeout);
	if (!$fp)
		{
		echo "\033[1;34m[*]\033[0m FECHADA:\t$port\n";
		}
	  else
		{
		echo "\033[0;32m[+]\033[0m ABERTA:\t$port\n";
		}

	fclose($fp);
	}

echo "\033[1;34m[*]\033[0m (Scan 100% completo, saindo..)\n\n";
?>
