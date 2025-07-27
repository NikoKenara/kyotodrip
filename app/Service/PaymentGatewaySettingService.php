<?php

namespace App\Service;

use App\Models\PaymentGatewaySetting;
use Cache;

class PaymentGatewaySettingService {

    function getSettings() {
        return Cache::rememberForever('gatewaySettings', function() {
            return PaymentGatewaySetting::pluck('value', 'key')->toArray();
        });
    }

    function setGlobalSettings(): void {
        $settings = $this->getSettings();
        config()->set('gatewaySettings', $settings);
    }

    function clearCachedSettings(): void {
        Cache::forget('gatewaySettings');
    }
}
