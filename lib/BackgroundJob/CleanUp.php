<?php
/**
 * @author Project Seminar "sciebo@Learnweb" of the University of Muenster
 * @copyright Copyright (c) 2017, University of Muenster
 * @license AGPL-3.0
 *
 * This code is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License, version 3,
 * as published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License, version 3,
 * along with this program.  If not, see <http://www.gnu.org/licenses/>
 */

namespace OCA\OAuth2\BackgroundJob;

use OCA\OAuth2\AppInfo\Application;

class CleanUp {

	/**
	 * Cleans up expired authorization codes and access tokens.
	 */
	public static function run() {
		$app = new Application();
		$container = $app->getContainer();

		$container->query('OCA\OAuth2\Db\AuthorizationCodeMapper')->cleanUp();
		$container->query('OCA\OAuth2\Db\AccessTokenMapper')->cleanUp();
	}

}
