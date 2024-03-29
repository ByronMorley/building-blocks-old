<?php

class SectionYouTubeVideoBlock extends Section
{

	private static $db = array(
		'src' => 'VarChar(100)',
		'embedCode' => 'Varchar(20)',
		'caption' => 'VarChar(100)',
		'width' => 'VarChar(30)',
		'border' => 'Boolean'
	);

	public function getCMSFields()
	{
		$fields = parent::getCMSFields();

		$widths = array(
			'full-width' => 'Full width',
			'large' => 'Large',
			'medium' => 'Medium',
			'small' => 'Small'
		);

		$alignment = array(
			'center' => 'Center',
			'left' => 'Left',
			'right' => 'Right'
		);

		$fieldList = array(
			TextField::create('embedCode', 'Embedding code'),
			TextField::create('caption', 'Caption'),
			DropdownField::create('width', 'Width', $widths),
			DropdownField::create('align', 'Align', $alignment),
			CheckboxField::create('border', 'Border')
		);

		$fields->removeByName('link');

		$fields->addFieldsToTab("Root.Main", $fieldList);

		return $fields;
	}

	public function populateDefaults()
	{
		$this->width = "full-width";
		$this->align = "center";
		parent::populateDefaults();
	}
}
