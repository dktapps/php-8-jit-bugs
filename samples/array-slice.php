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

var_dump(get_loaded_extensions());
var_dump(php_ini_loaded_file());
var_dump(opcache_get_status()["jit"]);
$book = new WritableBookBase;
$book2 = clone $book;
$book2->insertPage(0, "test");
