<?php
/**
 * Sastrawi (https://github.com/sastrawi/sastrawi)
 *
 * @link      http://github.com/sastrawi/sastrawi for the canonical source repository
 * @license   https://github.com/sastrawi/sastrawi/blob/master/LICENSE The MIT License (MIT)
 */

namespace Sastrawi\Stemmer;

class CachedStemmer implements StemmerInterface
{
    protected $cache;

    protected $delegatedStemmer;

    public function __construct(Cache\CacheInterface $cache, StemmerInterface $delegatedStemmer)
    {
        $this->cache = $cache;
        $this->delegatedStemmer = $delegatedStemmer;
    }
	public function stem2($text)
    {
		$stopWordRemoveFactory = new \Sastrawi\StopWordRemover\StopWordRemoverFactory();
		$stopWordRemove = $stopWordRemoveFactory->createStopWordRemover();

		
		$normalizedText = Filter\TextNormalizer::normalizeText($text);
		$normalizedText = strtolower($normalizedText);
		$words = explode(' ', $normalizedText);
		$words=$stopWordRemove->remove(implode(' ', $words));
		
		$words = explode(' ', $words);
		
		$stems = array();
        foreach ($words as $word) {
            if ($this->cache->has($word)) {
                if($this->cache->get($word) !='')
					{
						$stems[] = $this->cache->get($word);
					}		
            } else {
                $stem = $this->delegatedStemmer->stem($word);
                $this->cache->set($word, $stem);
                $stems[] = $stem;
				
            }
			
        }
		
		$stems=$stopWordRemove->remove(implode(' ', $stems));
		$stems = explode(' ', $stems);
		 foreach ($stems as $i => $word) {
            if ($stems[$i]=='') {
                unset($stems[$i]);
            }
        } 
        return $stems;
    }
	public function normalization ($text)
	{
		$normalizedText = Filter\TextNormalizer::normalizeText($text); //Memanggil object Normalisasi
		return $normalizedText;
	}
	public function caseFolding($normalizedText)
	{
		$caseFoldingText = strtolower($normalizedText);//Melakukan proses caseFolding	
		return $caseFoldingText;
	}
	public function Tokenization($caseFoldingText){
		$Tokenization = explode(' ', $caseFoldingText);//Melakukan Tokenization
		return $Tokenization;	
	}
	public function stopWordRemoveFactory($Tokenization){
		$stopWordRemoveFactory = new \Sastrawi\StopWordRemover\StopWordRemoverFactory();//Memanggil objectStopWordRemover
		$stopWordRemove = $stopWordRemoveFactory->createStopWordRemover();//Melakukan proses StopWord Remover
		$words=$stopWordRemove->remove(implode(' ', $Tokenization));
		$words = explode(' ', $words);
		return $words;
	}
	public function Stemming ($words){
		$stopWordRemoveFactory = new \Sastrawi\StopWordRemover\StopWordRemoverFactory();//Memanggil objectStopWordRemover
		$stopWordRemove = $stopWordRemoveFactory->createStopWordRemover();//Melakukan proses StopWord Remover
		
		$stems = array();
		foreach ($words as $word) {//Proses akhir Stemming
				if ($this->cache->has($word)) {
					if($this->cache->get($word) !='')
					{
						$stems[] = $this->cache->get($word);
					}	
				} else {
					$stem = $this->delegatedStemmer->stem($word);
					$this->cache->set($word, $stem);
					$stems[] = $stem;
				}
				
			}	
		$stems=$stopWordRemove->remove(implode(' ', $stems));
		$stems = explode(' ', $stems);
		 foreach ($stems as $i => $word) {
            if ($stems[$i]=='') {
                unset($stems[$i]);
            }
        } 
			return $stems;		
	}
	
    public function stem($text)
    {

		echo "==========================================================================";
		echo "<br>";
		echo "Proses Stemming = '".$text."'";
		echo "<br>";
		echo "==========================================================================";
		echo "<br>";
		$normalizedText = Filter\TextNormalizer::normalizeText($text); //Memanggil object Normalisasi
		echo "=>Normalisasi";
		echo "<br>";
		print_r($normalizedText); //Mencetak object Normalisasi
		echo "<br>";
		echo "==========================================================================";
		echo "<br>";
		$caseFoldingText = strtolower($normalizedText);//Melakukan proses caseFolding
       	echo "=>Case Folding";
		echo "<br>";
		print_r($caseFoldingText);
		echo "<br>";
		echo "==========================================================================";
		echo "<br>";
		echo "=>Tokenization";
		echo "<br>";
		$Tokenization = explode(' ', $caseFoldingText);//Melakukan Tokenization
		foreach ($Tokenization as $word) {
			if($word !='')
			{
				echo $word."<br>";
			}
		}
		echo "==========================================================================";
		echo "<br>";
		echo "=>Stopword Removing";
		echo "<br>";
		$stopWordRemoveFactory = new \Sastrawi\StopWordRemover\StopWordRemoverFactory();//Memanggil objectStopWordRemover
		$stopWordRemove = $stopWordRemoveFactory->createStopWordRemover();//Melakukan proses StopWord Remover
		$words=$stopWordRemove->remove(implode(' ', $Tokenization));
		$words = explode(' ', $words);
		foreach ($words as $word) {
			if($word !='')
			{
				echo $word."<br>";
			}
		}
		$stems = array();
		echo "==========================================================================";
		echo "<br>";
		echo "=>Stemming";
		echo "<br>";
        foreach ($words as $word) {//Proses akhir Stemming
            if ($this->cache->has($word)) {
                $stems[] = $this->cache->get($word);
				if($this->cache->get($word) !='')
				{
					echo $this->cache->get($word)."<br>";
				}	
            } else {
                $stem = $this->delegatedStemmer->stem($word);
                $this->cache->set($word, $stem);
                $stems[] = $stem;
				if($stem !='')
				{
					echo $stem."<br>";
				}
            }
			
        }
		echo "==========================================================================";
		$stems=$stopWordRemove->remove(implode(' ', $stems));
		$stems = explode(' ', $stems);
		 foreach ($stems as $i => $word) {
            if ($stems[$i]=='') {
                unset($stems[$i]);
            }
        }
        return implode(' ', $stems);
    }

    public function getCache()
    {
        return $this->cache;
    }

    public function getDelegatedStemmer()
    {
        return $this->delegatedStemmer;
    }
}
