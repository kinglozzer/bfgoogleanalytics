<?php

class GoogleLogger extends Extension {

	public function onAfterInit() {
		$config = SiteConfig::current_site_config();

		// include the JS snippet into the frontend page markup
		if($trackingID = $config->GoogleAnalyticsTrackingID) {
			$data = array(
				'GoogleAnalyticsTrackingID' => $trackingID,
				'GoogleAnalyticsParameters' => $config->GoogleAnalyticsParameters
			);
			
			$analyticsData = new ArrayData($data);
			Requirements::customScript($analyticsData->renderWith('GoogleAnalyticsJSSnippet'));
		}
	}

}