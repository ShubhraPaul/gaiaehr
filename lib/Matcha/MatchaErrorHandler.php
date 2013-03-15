<?php
/**
 * Matcha::connect
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

class MatchaErrorHandler extends Matcha
{
	
	public $__logFile;

	/**
	 * function __errorProcess($errorException):
	 * Handle the error of the exception generated by Matcha:connect
     * it now support FirePHP and ChomePHP.
	 */
	static public function __errorProcess($errorException, $__browserDebug = true)
	{

        // construct the exception error
        $trace = $errorException->getTrace();
        $constructErrorMessage = 'Exception: "';
        $constructErrorMessage .= $errorException->getMessage();
        $constructErrorMessage .= '" @ ';
        if($trace[0]['class'] != '') {
            $constructErrorMessage .= $trace[0]['class'];
            $constructErrorMessage .= '->';
        }
        $constructErrorMessage .= $trace[0]['function'];
        $constructErrorMessage .= '();';

        // normal output - to Apache error.log
		error_log('Matcha::connect: '.$constructErrorMessage);

        // Browser Debug Feature - Plugin
        $browserClass = new Browser();
        $browserName = $browserClass->getBrowser();
        if($__browserDebug)
        {
            if($browserName == Browser::BROWSER_FIREFOX) FirePHP::getInstance(true)->log($constructErrorMessage, 'FirePHP -> ');
            if($browserName == Browser::BROWSER_CHROME) ChromePhp::log('ChromePHP -> '.$constructErrorMessage);
        }

		return $errorException;
	}

	/**
	 * function __errorLogFile:
	 * A file that MatchaErrorHandler will put all the errors 
	 * events generated by Matcha::connect
	 */
	static public function __errorLogFile($file = NULL)
	{
		self::$__logFile = $file;
	}
}
