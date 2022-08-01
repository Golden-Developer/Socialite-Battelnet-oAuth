<?php

namespace Goldendeveloper\SocialiteProviders\BattleNet;

use Illuminate\Support\Facades\Facade;
use Goldendeveloper\SocialiteProviders\BattleNet\BattleNet;

class BattleNetFacade extends Facade {

	/**
     * {@inheritdoc}
     */
    protected static function getFacadeAccessor() {
    	return BattleNet::class;
    }
}
