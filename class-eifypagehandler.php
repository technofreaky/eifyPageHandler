<?php
/**
* The eifyPageHandler is created by 
* into any php based system
*
* @version 0.0.1
* @copyright 2014 - 2014
* @author Varun Sridharan (email: varunsridharan23@gmail.com)
* @link http://varunsridharan.in
*
* @license GNU General Public LIcense v3.0 - license.txt
* THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
* IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
* FITNESS FOR A PARTICULAR PURPOSE AND NON-INFRINGEMENT. IN NO EVENT SHALL THE
* AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
* LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
* OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
* THE SOFTWARE.
*
* @package eifyPageHander
*/
class eifyPageHander {
	
	protected $handler;
	
	function __construct() {
		$this->handler = array();
	}
	
	/**
	 * Register's A Page hander
	 * @param string $handler handler hane
	 * @param string $file file path for the handler
	 * @return boolean
	 */
	public function registerHandler($handler,$file) {
 		if(!array_key_exists($handler, $this->handler)){
 			$this->handler[$handler] = $file;
 			return true;
 		} else {return false;}
			
	}
	
	/**
	* Removes a page handler
	* @param string $handler handler name to remove
	* @return boolean
	*/	
	public function deregisterHandler($handler) {
		if(array_key_exists($handler, $this->handler)){
			unset($this->handler[$handler]);
		    return true;
 		} else {return false;}
	}
	
	
	/**
	 * Returns the file path for the given handler
	 * @param string $handler
	 * @return boolean
	 */
	public function getHandler($handler) {
		if(array_key_exists($handler, $this->handler)) {
			return $this->handler[$handler];
		} else {
			return false;
		}
	}
		
	/**
	 * Returns Current Requested Page
	 * @return Handler Name [string]
	 */
	public function requestHander() {
		$url = $_SERVER['REQUEST_URI'];
		$url =  explode(EIFY_USE_DIR."/",$url);
		$url = explode("?",$url[1]);
		return $url[0]; 
	}
	
}
