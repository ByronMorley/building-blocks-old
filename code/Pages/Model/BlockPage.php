<?php

class BlockPage extends Page
{

	private static $db = array();

	private static $has_one = array();

	private static $has_many = array();

	private static $summary_fields = array();

	public function getCMSFields()
	{
		$fields = parent::getCMSFields();

		$fields->removeByName('Content');

		return $fields;
	}
}