<?php

namespace Sastrawi\StopWordRemover;

use Sastrawi\Dictionary\ArrayDictionary;

class StopWordRemoverFactory
{
    public function createStopWordRemover()
    {
        $stopWords = $this->getStopWords();

        $dictionary = new ArrayDictionary($stopWords);
        $stopWordRemover = new StopWordRemover($dictionary);

        return $stopWordRemover;
    }

    public function getStopWords()
    {
        return array(
            'yang','yg', 'untuk','untk', 'pada','pd', 'ke', 'para', 'namun', 'menurut', 'antara', 'dia', 'dua', 'utk', 'trmksh', 'kapan', 'mau', 'menjadi', 'salah', 'satu', 'rasa', 'memang',
            'ia', 'seperti', 'jika', 'sehingga', 'kembali','dan','tidak','tdk', 'ini', 'karena','karna', 'jadi', 'kejadian',
            'kepada','kpd', 'oleh', 'saat', 'harus', 'sementara', 'setelah', 'belum', 'kami', 'sekitar', 'bs', 'menggunakan', 'sangat', 'selalu', 'knp', 'mgp', 'ats', 'dr', 'harusnya',
            'bagi', 'serta', 'di', 'dari', 'telah', 'sebagai', 'masih', 'hal', 'ketika', 'adalah',
            'itu', 'dalam', 'bisa', 'bahwa', 'atau', 'hanya', 'kita', 'dengan', 'dgn', 'akan', 'juga',
            'ada', 'mereka', 'sudah', 'saya', 'terhadap', 'secara', 'agar', 'lain', 'anda',
            'begitu', 'mengapa', 'kenapa', 'yaitu', 'yakni', 'daripada', 'itulah', 'lagi', 'maka',
            'tentang', 'demi', 'dimana', 'kemana', 'pula', 'sambil', 'sebelum', 'sesudah', 'supaya',
            'guna', 'kah', 'pun', 'sampai', 'sedangkan', 'selagi', 'sementara', 'tetapi', 'apakah',
            'kecuali', 'sebab', 'selain', 'seolah', 'seraya', 'seterusnya', 'tanpa', 'agak', 'boleh',
            'dapat', 'dsb', 'dst', 'dll', 'dahulu', 'dulunya', 'anu', 'demikian', 'tapi', 'ingin',
            'juga', 'nggak', 'mari', 'nanti', 'melainkan', 'oh', 'ok', 'seharusnya', 'sebetulnya',
            'setiap', 'setidaknya', 'sesuatu', 'pasti', 'saja', 'toh', 'ya', 'walau', 'tolong',
            'tentu', 'amat', 'apalagi', 'bagaimanapun','kan','lah','mana','lahh','ng','bila','haha','yang','','se','nya','ber', 'selanjutnya', 'tp', 'd', 'lebih', 'mendapatkan', 'dapat',  'kemarin', 'hrs', 'sdh', 'malah', 'cuma', 'nya',
        );
    }
}
