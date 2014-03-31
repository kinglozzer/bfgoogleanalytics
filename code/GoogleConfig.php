<?php

class GoogleConfig extends DataExtension {

	private static $db = array(
		'GoogleAnalyticsTrackingID' => 'Varchar',
		'GoogleAnalyticsParameters' => 'Text'
	);

	/**
	 * @param FieldList $fields
	 */
	public function updateCMSFields(FieldList $fields) {
		$analyticsFields = FieldList::create(
			TextField::create("GoogleAnalyticsTrackingID", "Google Analytics Tracking ID")
				->setRightTitle("e.g. UA-XXXXXX-X"),
			TextareaField::create("GoogleAnalyticsParameters", "Additional Parameters")
				->setRightTitle("<strong>Advanced users only.</strong> 
					If you do not know what this field does, please leave it blank.")
		);

		$fields->addFieldToTab("Root", Tab::create('GoogleAnalytics')->setChildren($analyticsFields));
	}

}