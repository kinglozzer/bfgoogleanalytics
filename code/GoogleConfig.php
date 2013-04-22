<?php

/**
 * @package googleanalytics
 */
class GoogleConfig extends DataExtension {

	static $db = array(
		'GoogleAnalyticsTrackingID' => 'Varchar',
		'GoogleAnalyticsParameters' => 'Text'
	);

	public function updateCMSFields(FieldList $fields) {
		$fields->addFieldToTab("Root", new Tab('GoogleAnalytics'));
		$fields->addFieldToTab("Root.GoogleAnalytics", $trackingID = new TextField("GoogleAnalyticsTrackingID", "Google Analytics Tracking ID"));
		$fields->addFieldToTab("Root.GoogleAnalytics", $parameters = new TextareaField("GoogleAnalyticsParameters", "Additional Parameters"));
	
		$trackingID->setRightTitle("e.g. UA-XXXXXX-X");
		$parameters->setRightTitle("<strong>Advanced users only.</strong> If you do not know what this field does, please leave it blank.");
	}

}