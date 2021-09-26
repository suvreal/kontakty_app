<?php

namespace App\Model;

use Nette;

class ArticleManager
{
	use Nette\SmartObject;

	private Nette\Database\Explorer $database;

	// Předání objektu pro práci s DB vrstvou
	public function __construct(Nette\Database\Explorer $database)
	{
		$this->database = $database;
	}

    // Výpis hlavního obsahu - záznamů
	public function getPublicArticles(int $fetch, int $offset) //původně bez argumentů
	{
        //return $this->database->query('SELECT * FROM kontakt WHERE datum_vytvoreni < ? ORDER BY datum_vytvoreni DESC OFFSET ? ROWS FETCH NEXT ? ROWS ONLY', new \DateTime, $offset, $fetch);
		return $this->database->query('SELECT * FROM kontakt ORDER BY jmeno ASC LIMIT ?, ?', $offset, $fetch);
		/*return $this->database
		->table('kontakt')
		->where('datum_vytvoreni < ', new \DateTime)
		->order('datum_vytvoreni DESC');*/
	}

    // Metoda pro získání celkového počtu publikovaných článků
    public function getPublishedArticlesCount(): int
	{
		//return $this->database->fetchField('SELECT COUNT(*) FROM posts WHERE created_at < ?', new \DateTime);
		return $this->database->fetchField('SELECT COUNT(*) as count FROM kontakt');
	}

    // Smazání dle volání
    public function handledelete($id){
        $this->database->table('kontakt')->where('id', $id)->delete();
    }
}
