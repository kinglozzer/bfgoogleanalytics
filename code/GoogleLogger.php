<?php

namespace BigforkGoogleAnalytics;

use SilverStripe\Core\Extension;
use SilverStripe\SiteConfig\SiteConfig;
use SilverStripe\View\ArrayData;
use SilverStripe\View\Requirements;

class GoogleLogger extends Extension
{
    public function onAfterInit()
    {
        if ($this->owner->getRequest()->getVar('CMSPreview')) {
            return;
        }

        $config = SiteConfig::current_site_config();

        // include the JS snippet into the frontend page markup
        if ($trackingID = $config->GoogleAnalyticsTrackingID) {
            $analyticsData = new ArrayData([
                'GoogleAnalyticsTrackingID' => $trackingID,
                'GoogleAnalyticsParameters' => $config->GoogleAnalyticsParameters,
                'GoogleAnalyticsConstructorParameters' => $config->GoogleAnalyticsConstructorParameters
            ]);
            Requirements::insertHeadTags($analyticsData->renderWith('GoogleAnalyticsJSSnippet'), 'GoogleAnalytics');
        }
    }
}
