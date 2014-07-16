<?php
/**
* The eifyPageHandler is created by inspring wordpress and elgg
* this class can be used in any php apps / scripts
*
* @version 0.2
* @copyright 2014
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
	
	protected $handler = array();
	public $currentHandler;
 
	/**
	 * Register's A Page hander
	 * @param string $handler handler hane
	 * @param string $file file path for the handler
	 * @return boolean
	 */
	public function registerHandler($Rhandler,$file,$title,$login = true) {
		$handlekey = @$this->handler[$Rhandler];
 		if(!array_key_exists($handlekey, $this->handler)){
 			$this->handler[$Rhandler]['file'] = $file;
 			$this->handler[$Rhandler]['login']= $login;
 			$this->handler[$Rhandler]['title']= $title;
 			$this->handler[$Rhandler]['handler'] = $Rhandler;
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
			$this->currentHandler = $this->handler[$handler];
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
		$url = str_replace("/","",$url);
		if(!empty($url[0])) {
			return $url[0];
		} else {
			return false;
		}
		 
	}
	
	
	/**
	 * Retrives Current Handler datas 
	 * @param string $request [file,title,handler]
	 * @return string | boolean
	 */
	private function current_handler($request) {
		if(isset($this->currentHandler[$request])) {
			return $this->currentHandler[$request];
		} else {
			return false;
		}
	}
	

	/**
	 * Retrives Current Handlers Title
	 * @return string | boolean
	 */
	public function currentTitle() {
		return $this->current_handler('title');
	}
	
	/**
	 * Retrives Current Handlers file
	 * @return string | boolean
	 */
	public function currentPage() {
		return $this->current_handler('file');
	}
	
	/**
	 * Retrives Current Handlers handler Name
	 * @return string | boolean
	 */
	public function currentHandler() {
		return $this->current_handler('handler');
	}

}
