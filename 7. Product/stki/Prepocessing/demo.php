<?php
// demo.php

// include composer autoloader
require_once (__DIR__ . '/vendor/autoload.php');

// create stemmer
// cukup dijalankan sekali saja, biasanya didaftarkan di service container
$stemmerFactory = new \Sastrawi\Stemmer\StemmerFactory();
$stemmer  = $stemmerFactory->createStemmer();

// stem
$sentence = 'rejeki hari ini adalah kirim barang pake JNE YES gratis Kata mbak-nya cuma sampe';
$output   = $stemmer->stem($sentence);

echo "";

echo $output . "\n";
// ekonomi indonesia sedang dalam tumbuh yang bangga

//echo $stemmer->stem('Mereka meniru-nirukannya') . "\n";
// mereka tiru