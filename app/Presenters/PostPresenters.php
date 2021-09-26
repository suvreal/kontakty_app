<?php
namespace App\Presenters;

use Nette;
use Nette\Application\UI\Form;

class PostPresenter extends Nette\Application\UI\Presenter
{
	
	private Nette\Database\Explorer $database;

	public function __construct(Nette\Database\Explorer $database)
	{
		$this->database = $database;
	}

	// Zobrazení detailu záznamu spolu s komentáři - render metoda
	public function renderShow(int $postId): void
	{
		$post = $this->database->table('kontakt')->get($postId);

		if (!$post) {
			$this->error('Post not found');
		}
	
		$this->template->post = $post;	
	}

	// Získání dat z formuláře pro vytváření příspěvků a zavolání metody pro uložení získaných dat do db - záznamy
	protected function createComponentPostForm(): Form
	{

		$form = new Nette\Application\UI\Form;	
				
		$form->addText('jmeno', 'jméno:')
			->setHtmlAttribute('class', 'txtinput')
			->setRequired();

		$form->addText('prijmeni', 'přijmení:')
			->setHtmlAttribute('class', 'txtinput');

		$form->addText('telefon', 'telefon:')
			->setHtmlAttribute('class', 'txtinput')
			->setRequired();

		$form->addText('email', 'email:')
			->setHtmlAttribute('class', 'txtinput');

		$form->addTextArea('poznamka', 'poznámka:')
			->setHtmlAttribute('class', 'txtinput');
		
		$form->addSubmit('send', 'Uložit')
		->setHtmlAttribute('class','submitmainform');
		$form->onSuccess[] = [$this, 'postFormSucceeded'];

		return $form;

	}

	// Uložení dat do db dle volání - záznamy
	public function postFormSucceeded(array $values): void
	{
		$postId = $this->getParameter('postId');

		if ($postId) {
			$post = $this->database->table('kontakt')->get($postId);
			$post->update($values);
		} else {
			$post = $this->database->table('kontakt')->insert($values);
		}
	
		$this->flashMessage('Kontakt byl úspěšně uložen.', 'success');
		$this->redirect('show', $post->id);
	}

	public function actionEdit(int $postId): void
	{
		$post = $this->database->table('kontakt')->get($postId);
		if (!$post) {
			$this->error('Kontakt nebyl nalezen');
		}
		$this['postForm']->setDefaults($post->toArray());
	}

}

