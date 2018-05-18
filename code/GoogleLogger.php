<?php

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
            $data = array(
                'GoogleAnalyticsTrackingID' => $trackingID,
                'GoogleAnalyticsParameters' => $config->GoogleAnalyticsParameters,
                'GoogleAnalyticsConstructorParameters' => $config->GoogleAnalyticsConstructorParameters
            );

            $analyticsData = new ArrayData($data);
            Requirements::insertHeadTags($analyticsData->renderWith('GoogleAnalyticsJSSnippet'), 'GoogleAnalytics');
        }
    }
}
