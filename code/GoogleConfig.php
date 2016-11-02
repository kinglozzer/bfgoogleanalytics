<?php

namespace BigforkGoogleAnalytics;

use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\Tab;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\TextareaField;
use SilverStripe\ORM\DataExtension;

class GoogleConfig extends DataExtension
{
    private static $db = [
        'GoogleAnalyticsTrackingID' => 'Varchar',
        'GoogleAnalyticsParameters' => 'Text',
        'GoogleAnalyticsConstructorParameters' => 'Text'
    ];

    /**
     * @inheritdoc
     */
    public function updateCMSFields(FieldList $fields)
    {
        $analyticsFields = FieldList::create(
            TextField::create("GoogleAnalyticsTrackingID", "Google Analytics Tracking ID")
                ->setDescription("e.g. UA-XXXXXX-X"),
            TextareaField::create("GoogleAnalyticsParameters", "Additional Parameters")
                ->setDescription("<strong>Advanced users only.</strong>
					If you do not know what this field does, please leave it blank."),
            TextareaField::create("GoogleAnalyticsConstructorParameters", "Constructor Parameters")
                ->setDescription("<strong>Advanced users only.</strong>
					If you do not know what this field does, please leave it blank. An object to be
					passed as an argument to ga.create()")
        );

        $fields->addFieldToTab('Root', Tab::create('GoogleAnalytics')->setChildren($analyticsFields));
    }
}
