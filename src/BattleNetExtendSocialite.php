<?php

namespace Goldendeveloper\SocialiteProviders\BattleNet;

use SocialiteProviders\Manager\SocialiteWasCalled;

class BattleNetExtendSocialite
{
    /**
     * Execute the provider.
     */
    public function handle(SocialiteWasCalled $socialiteWasCalled)
    {
        $socialiteWasCalled->extendSocialite('battlenet', Provider::class);
    }
}
