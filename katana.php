<?php

chdir(__DIR__);

if(is_file("../build/Katana.phar")){
	unlink("../build/Katana.phar");
}else{
	@mkdir("../build");
}

$phar = new Phar("../build/Katana.phar");
$phar->setSignatureAlgorithm(Phar::SHA1);
$phar->setStub('<?php define("pocketmine\\\\PATH", "phar://". __FILE__ ."/"); require_once("phar://". __FILE__ ."/src/pocketmine/PocketMine.php");  __HALT_COMPILER();');
$phar->startBuffering();
$filePath = "./";
foreach(new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($filePath . "src")) as $file){
	$path = ltrim(str_replace(["\\", $filePath], ["/", ""], $file), "/");
	if($path{0} === "." or strpos($path, "/.") !== false or substr($path, 0, 4) !== "src/"){
		continue;
	}
	$phar->addFile($file, $path);
	echo "\rAdding $path";
}
echo "\n";
$phar->stopBuffering();

exec("git add -A");
