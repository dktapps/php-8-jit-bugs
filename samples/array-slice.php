<?php

class WritableBookPage{
	public function __construct(string $text){}
}

class WritableBookBase{


	/**
	 * @var WritableBookPage[]
	 * @phpstan-var list<WritableBookPage>
	 */
	private $pages = [];


	/**
	 * Inserts a new page with the given text and moves other pages upwards.
	 *
	 * @return $this
	 */
	public function insertPage(int $pageId, string $pageText = "") : self{
		if($pageId < 0 || $pageId > count($this->pages)){
			throw new \InvalidArgumentException("Page ID must not be negative");
		}
		$newPages = array_slice($this->pages, 0, $pageId);
		$newPages[] = new WritableBookPage($pageText);
		array_push($newPages, ...array_slice($this->pages, $pageId));
		$this->pages = $newPages;
		return $this;
	}
}

$book = new WritableBookBase;
$book->insertPage(0, "test");
