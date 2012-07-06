<?php
/**
* @package shorty-tacking an ownCloud url shortener plugin addition
* @category internet
* @author Christian Reiner
* @copyright 2012-2012 Christian Reiner <foss@christian-reiner.info>
* @license GNU AFFERO GENERAL PUBLIC LICENSE (AGPL)
* @link information
* @link repository https://svn.christian-reiner.info/svn/app/oc/shorty-tracking
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
 * @file ajax/layout.php
 * @brief Ajax method to retrieve the basic html layout for the list dialog
 * @param id (string) Alphanumerical id of the Shorty
 * @param title (string) Titel of the Shorty
 * @returns (json) success/error state indicator
 * @returns (json) Associative array of click records matching the Shorty
 * @returns (json) Human readable message
 * @author Christian Reiner
 */

// swallow any accidential output generated by php notices and stuff to preserve a clean JSON reply structure
OC_Shorty_Tools::ob_control ( TRUE );

 //no apps or filesystem
$RUNTIME_NOSETUPFS = TRUE;
$RUNTIME_NOAPPS = TRUE;

// Check if we are a user
OCP\JSON::checkLoggedIn ( );
OCP\JSON::checkAppEnabled ( 'shorty' );
OCP\JSON::checkAppEnabled ( 'shorty-tracking' );

try
{
  // render dialog layout
  $tmpl = new OCP\Template( 'shorty-tracking', 'tmpl_trc_dlg' );
  $tmpl->assign ( 'shorty', $shorty );
  // available status options (required for select filter in toolbox)
  $shorty_result['']=sprintf('- %s -',OC_Shorty_L10n::t('all'));
  foreach ( OC_Shorty_Type::$RESULT as $result )
    $shorty_result[$result] = OC_Shorty_L10n::t($result);
  $tmpl->assign ( 'shorty-result', $shorty_result );

  // swallow any accidential output generated by php notices and stuff to preserve a clean JSON reply structure
  OC_Shorty_Tools::ob_control ( FALSE );
  OCP\Util::writeLog( 'shorty-tracking', sprintf("Retrieved list of clicks on Shorty '%s', starting with offset '%s'",$p_id,$p_offset), OC_Log::INFO );
  OCP\JSON::success ( array ( 'data'    => $result[0],
                              'layout'  => $tmpl->fetchPage(),
                              'message' => OC_Shorty_L10n::t("Listing %s clicks from a total of %s",count($clicks),intval($total)) ) );
} catch ( Exception $e ) { OC_Shorty_Exception::JSONerror($e); }
?>
