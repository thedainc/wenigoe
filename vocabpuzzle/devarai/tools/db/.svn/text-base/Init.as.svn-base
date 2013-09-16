package devarai.tools.db {
	import flash.display.MovieClip;
	import flash.events.Event;
	import flash.text.TextField;
	
	/**
	 * This is the log in handler.
	 */
	public class Init extends MovieClip {
		
		// Password
		public static var pw:String = "-";
		
		/**
		 * Link back to main class.
		 */
		private var sc:Admin;
		
		/**
		 * Constructor.
		 */
		public function Init(ad:Admin) {
			this.sc =ad;
			(password_txt as TextField).displayAsPassword = true;
			sub_mc.addEventListener("interaction", pwsubmit);
			wrong_txt.visible = false;
			sc.controller.addEventListener("passwordError", failPW);
			sc.controller.addEventListener("refreshTable", tabRefresh);
		}
		
		
		/**
		 * Triggered if the user submitted the pw.
		 */
		private function pwsubmit(evt:Event):void {
			
			sc.controller.refreshDicts(password_txt.text);
			sub_mc.removeEventListener("interaction", pwsubmit);
			
		}
		
		private function failPW(evt:Event):void {
			
			wrong_txt.visible = true;
			sub_mc.addEventListener("interaction", pwsubmit);
			
		}
		
		/**
		 * Login was successfull.
		 */
		private function tabRefresh(evt:Event):void {
			
			wrong_txt.visible = false;
			sub_mc.removeEventListener("interaction", pwsubmit);
			pw = password_txt.text;
			sc.controller.removeEventListener("refreshTable", tabRefresh);
			parent.removeChild(this);
			
			this.dispatchEvent(new Event("loggedIn"));
			
		}
		
		
		
	}
	
}