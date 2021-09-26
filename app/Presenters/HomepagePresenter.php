<?php

declare(strict_types=1);

namespace App\Presenters;

use Nette;
use App\Model\ArticleManager;

class HomepagePresenter extends Nette\Application\UI\Presenter
{
	
	private ArticleManager $articleManager;

	public function __construct(ArticleManager $articleManager) 
	{
		$this->articleManager = $articleManager;
	}

	// Výpis stránkování
	public function renderDefault(int $page = 1): void //původně bez argumentu
	{

		// Zjistíme si celkový počet publikovaných článků
		$articlesCount = $this->articleManager->getPublishedArticlesCount();

		// Vyrobíme si instanci Paginatoru a nastavíme jej
		$paginator = new Nette\Utils\Paginator;
		$paginator->setItemCount($articlesCount); // celkový počet článků
		$paginator->setItemsPerPage(10); // počet položek na stránce
		$paginator->setPage($page); // číslo aktuální stránky

		// Z databáze si vytáhneme omezenou množinu článků podle výpočtu Paginatoru
		$posts = $this->articleManager->getPublicArticles($paginator->getLength(), $paginator->getOffset());

		// Kterou předáme do šablony
		$this->template->posts = $posts;
		
		// A také samotný Paginator pro zobrazení možností stránkování
		$this->template->paginator = $paginator;

	}

	// Zavolání funkce ke smazání záznamu
	function handledelete($id)  {
		return $this->articleManager->handledelete($id);
	}	
}