<?php

class SectionPoemBlock extends Section {

	private static $db = array(
		'Title' => 'Varchar',
		'Content' => 'HTMLText',
		'Author' => 'Varchar',
	);

	private static $has_one = array(

	);

	public function getCMSFields()
	{
		$fields = parent::getCMSFields();

		return $fields;
	}

	public function populateDefaults()
	{

	}
}
