<?php

class GoogleLogger extends Extension {

	public function onAfterInit() {
		// include the JS snippet into the frontend page markup
		if($trackingID = SiteConfig::current_site_config()->GoogleAnalyticsTrackingID) {
			$data = array(
				'GoogleAnalyticsTrackingID' => $trackingID,
				'GoogleAnalyticsParameters' => SiteConfig::current_site_config()->GoogleAnalyticsParameters
			);
			$analyticsData = new ArrayData($data);
			Requirements::customScript($analyticsData->renderWith('GoogleAnalyticsJSSnippet'));
		}
	}

}