package devarai.tools.db {
	import flash.display.MovieClip;
	import flash.events.Event;
	import flash.events.MouseEvent;
	
	/**
	 * Glass button. Linked to lib.
	 */
	public class Glass extends MovieClip {
		
		/**
		 * Constructor.
		 */
		public function Glass() {
			
			this.buttonMode = true;
			this.focusRect = false;
			this.addEventListener(MouseEvent.CLICK, clicked);
			
		}
		
		private function clicked(evt:Event):void {
			this.dispatchEvent(new Event("interaction"));
		}
		
	}
	
}