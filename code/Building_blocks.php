<?php

class Building_blocks extends DataExtension {

	public static $allowed_actions = array();

	private static $db = array();

	private static $has_one = array();

	private static $has_many = array(
		'Sections' => 'Section'
	);

	public function contentControllerInit()
	{

		Requirements::css(BUILDING_BLOCKS_DIR .'/css/style.css');;
		Requirements::javascript(BUILDING_BLOCKS_DIR .'/js/main.min.js');
	}

	public function getCMSFields()
	{
		$fields = parent::getCMSFields();
		$this->extend('updateCMSFields', $fields);
		return $fields;
	}
	public function updateCMSFields(FieldList $fields)
	{
		/*********************************
		 *      COMPONENT BUILDER
		 ********************************/

		$dataColumns = new GridFieldDataColumns();
		$dataColumns->setDisplayFields(
			array(

				'ClassName' => 'Class Name'
			)
		);

		$multiClassConfig = new GridFieldAddNewMultiClass();
		$multiClassConfig->setClasses(
			array(
				'SectionImageBlock' => SectionImageBlock::get_section_type(),
				'SectionTextBlock' => SectionTextBlock::get_section_type(),
				'SectionGalleryBlock' => SectionGalleryBlock::get_section_type(),
				'SectionYouTubeVideoBlock' => SectionYouTubeVideoBlock::get_section_type(),
				'SectionLinkBlock' => SectionLinkBlock::get_section_type(),
				'SectionActivityGroup' => SectionActivityGroup::get_section_type(),
			)
		);

		$config = GridFieldConfig_RelationEditor::create()
			->removeComponentsByType('GridFieldAddNewButton')
			->addComponents(
				new GridFieldOrderableRows('SortOrder'),
				new GridFieldDeleteAction(),
				$multiClassConfig,
				$dataColumns
			);

		$gridField = GridField::create('Sections', "Sections", $this->owner->Sections(), $config);
		$fields->addFieldToTab("Root.Sections", $gridField);

	}

}