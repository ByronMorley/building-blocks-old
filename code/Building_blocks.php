<?php

class Building_blocks extends DataExtension
{

    public static $allowed_actions = array();

    private static $db = array();

    private static $has_one = array(
        'BackgroundImage' => 'Image'
    );

    private static $has_many = array(
        'Sections' => 'Section'
    );

    public function contentControllerInit()
    {

        /*  -- Stylesheets --*/
        Requirements::css('twitter/bootstrap/dist/css/bootstrap.min.css');
        Requirements::css('components/font-awesome/css/font-awesome.min.css');

        Requirements::css(BUILDING_BLOCKS_DIR . '/css/style.min.css');
        Requirements::css(BUILDING_BLOCKS_DIR . '/css/print.css', 'print');


        /*  -- Javascript --*/
        Requirements::javascript('components/jquery/jquery.min.js');
        Requirements::javascript('twitter/bootstrap/dist/js/bootstrap.min.js');

        Requirements::javascript(BUILDING_BLOCKS_DIR . '/js/main.min.js');

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
                'SectionVideoBlock' => SectionVideoBlock::get_section_type(),
                'SectionActivityBlock' => SectionActivityBlock::get_section_type(),
                'SectionPoemBlock' => SectionPoemBlock::get_section_type(),
                'SectionLogoBlock' => SectionLogoBlock::get_section_type(),
                'SectionInputBlock' => SectionInputBlock::get_section_type(),
                'SectionWordBankBlock' => SectionWordBankBlock::get_section_type(),
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


        /*-- Background image --*/

        $uploadField = UploadField::create('BackgroundImage');
        $uploadField->setFolderName('BackgroundImages');
        $uploadField->getValidator()->setAllowedExtensions(array(
            'png', 'gif', 'jpeg', 'jpg'
        ));

        $fields->addFieldToTab("Root.Images", $uploadField);

    }

    public function setBackgroundImage($id)
    {
        Session::set('BackgroundImage', $id);
    }

    public function getBackgroundImage()
    {
        return Image::get()->byID(Session::get('BackgroundImage'));
    }

}