<?php
/**
 * @package shorty-tracking an ownCloud url shortener plugin addition
 * @category internet
 * @author Christian Reiner
 * @copyright 2012-2015 Christian Reiner <foss@christian-reiner.info>
 * @license GNU Affero General Public license (AGPL)
 * @link information http://apps.owncloud.com/content/show.php/Shorty+Tracking?content=152473
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU AFFERO GENERAL PUBLIC LICENSE
 * License as published by the Free Software Foundation; either
 * version 3 of the license, or any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU AFFERO GENERAL PUBLIC LICENSE for more details.
 *
 * You should have received a copy of the GNU Affero General Public
 * License along with this library.
 * If not, see <http://www.gnu.org/licenses/>.
 *
 */

/**
 * @file plugin/loops/shorty_action_edit.php
 * @author Christian Reiner
 */

namespace OCA\Shorty\Loop;

/**
 * @class ShortyActionEdit
 * @extends \OCA\Shorty\Plugin\Loop
 * @brief 'edit' action on a Shorty
 * @access public
 * @author Christian Reiner
 */
class ShortyActionEdit extends \OCA\Shorty\Plugin\LoopShortyAction
{
	const LOOP_APP = 'shorty';
	const LOOP_INDEX = 104;

	const ACTION_NAME      = 'edit';
	const ACTION_ICON      = 'actions/rename.svg';
	const ACTION_CALLBACK  = 'OC.Shorty.WUI.Entry.edit';
	const ACTION_TITLE     = "Modify details";
	const ACTION_ALT       = "modify";
}
