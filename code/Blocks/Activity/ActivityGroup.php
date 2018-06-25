<?php

class ActivityGroup extends DataObject
{

	private static $db = array(
		'Title' => 'Varchar'
	);

	private static $has_one = array();

	public function getCMSFields()
	{
		$fields = parent::getCMSFields();

		$fields->addFieldToTab('Root.Main', TextField::create('Title')->setCustomValidationMessage('This Field is Required'));

		return $fields;
	}

}