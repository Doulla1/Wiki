<?php

namespace MediaWiki\Skins\Vector\ResourceLoader;

use MediaWiki\MainConfigNames;
use MediaWiki\ResourceLoader as RL;
use MediaWiki\Skins\Vector\Constants;

class VectorResourceLoaderUserStylesModule extends RL\UserStylesModule {
	/**
	 * @inheritDoc
	 */
	protected function getPages( RL\Context $context ) {
		$user = $context->getUserObj();
		$pages = [];
		$config = $this->getConfig();
		if ( $context->getSkin() === Constants::SKIN_NAME_MODERN &&
			$config->get( 'VectorShareUserScripts' ) &&
			$config->get( MainConfigNames::AllowUserCss ) &&
			$user->isRegistered()
		) {
			$userPage = $user->getUserPage()->getPrefixedDBkey();
			$pages["$userPage/vector.css"] = [ 'type' => 'style' ];
		}
		return $pages;
	}
}
