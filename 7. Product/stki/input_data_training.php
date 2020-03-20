<?php

require_once('NaiveBayesClassifier.php');

$classifier = new NaiveBayesClassifier();
$spam = Category::$SPAM;
$ham = Category::$HAM;
$net = Category::$NET;

$classifier->train('Pelayanan BPJS Kesehatan Masih Brengsek https://goo.gl/fb/3Gj0MtÂ  #eksposnews', $spam);
$classifier->train('kenapa harus kartu baru? Bukannya E-KTP kita juga bisa diisi informasi npwp, bpjs, dll? Apa karena memory nya kurang?', $spam);
$classifier->train('Oleh itu jika anda memiliki kedua-duanya janganlah anda lupa pada Yang Maha Berkuasa. @BPJS_Kesehatan', $ham);
$classifier->train('terima kasih bpjs pelayanannya sangat baik', $ham);
$classifier->train('BPJS butuh dibenahi setuju. Tp sbg pasien anda tdk perlu takut komunikasi dgn dokter anda, kerna kwajiban dokter melayani pasien dgn baik', $ham);
$classifier->train('Cantik, matre, wajar. Karena perawatan muka gak bisa make BPJS', $spam);
$classifier->train('di pendaftaran loket kl non bpjs. kl bpjs gratis', $ham);
$classifier->train('Eh tapi mungkin bergantung RS sih. Bukan BPJS nya ding.', $ham);
$classifier->train('@KyaiMblebes Semoga hari ini Indonesia lebih baik dari hari kemarin. Negara di beri keselamatan. Rakyatnya diberikan kesehatan (Biaya BPJS tidak Meroket) Diberikan murah Rezeki (Agar tak nyari hutangan ) Diberikan kerukunan (Agar tak bubar 30 Th Yg akan datang ) Amin', $ham);
$classifier->train('Disini ada yg kaga punya bpjs gak', $spam);
$classifier->train('Gari kartu bpjs iki', $spam);
$classifier->train('wah keburu habis ngga sempat disimpan bos.Apalagi BPJS , jm ngga keluar2', $spam);
$classifier->train('Pelayanan dodolmu. Smua kartu2 sakti yg disajikan gak ada gunanya. Yg parah kartu bpjs aja udh susah digunakan. Duitnya disulap jd aspal dan Tol. Makan tuh aspal bong #PrabowoBentengNKRI', $spam);
$classifier->train('Mau pake dana haji dana BPJS dana apapun sy setuju asal tepatin dulu janji2 kampanye bapak pas debat dulu ok?! pic.twitter.com/JQIf6gPGeq', $ham);
$classifier->train('Janji tiga kartu.BPJS jg yg d bayar rakyat malah d utang.', $spam);
$classifier->train('Di pimpin jokowi lagi malah semakin hancur, ngurus KTP sama BPJS aja gak becus, gembar gembor era digital, era milenium, serba cepat, buat apa ngeluari kartu bamyak bayak, era digital rasa primitip?? #PrabowoBentengNKRI #PrabowoMenangDebat', $spam);
$classifier->train('Agak sensiin juga sih kayaknya bpjs buat dokter tuh. Soalnya kata temenku yg dokter, semua biaya pengobatan ada paket tertentu dr bpjs. Malah kadang dokternya yang nalangin kalo dr bpjs paketnya g ngatasin. Entahlah apa ini yg beliau keluhkan', $spam);
$classifier->train('	Logika bani kolam , sekalian aja spcial untuk Ibu yang mau melahirkan lumayan hemat bpjs , logika pekok', $spam);
$classifier->train('Dibubut juga biar lebih halus hasil lasnya, mumpung lagi gaproduksi bengkelnya tapi bayar om @rockygerung karena bubut gaditanggung BPJS', $spam);
$classifier->train('Tolong infonya untuk pendaftaran bpjs calon bayi berapa hari kerja.agar bisa terlihat di aplikasi jkn mobile.', $ham);
$classifier->train('Ketika skincare abis di saat yg bersamaan dan gk bisa d klaim bpjs disitu saya ingin meronta2', $spam);
$classifier->train('BPJS Terbukti Rusak, Sampai Kapan Dipaksakan?http://dlvr.it/QvcGMsÂ pic.twitter.com/mXzqv2vgbW', $spam);
$classifier->train('byk yg kecewa dgn bpjs pembayaran sering telat', $spam);
$classifier->train('Makanya dia sendiri kok malah nyusahin amat gak bisa bayar BPJS', $spam);
$classifier->train('Daripada membenani sebaiknya di bubarkan saja. BPJS kan janji kampanye dulu. Kan sudah menang. Ya udahlah', $spam);
