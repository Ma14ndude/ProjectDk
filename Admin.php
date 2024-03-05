<?
include "Rcon.php";

$host = '45.93.200.34'; 
$port = 17576;                      
$password = 'bi580x1jSs'; 
$timeout = 3;      
$command = $_POST['commandServer'];               

use Thedudeguy\Rcon;

$rcon = new Rcon($host, $port, $password, $timeout);

if ($rcon->connect())
{
  $rcon->sendCommand("$command");
}
header('location: Indexadmpanel.html')

?>