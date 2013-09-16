package devarai.games.vocabularyPuzzle.tools {
	import devarai.games.vocabularyPuzzle.tools.Bulb;
	
	import flash.display.MovieClip;
	import flash.events.Event;
	import flash.events.MouseEvent;
		
	public class BulbWrapper extends MovieClip {

		
		private var bulb:Bulb = new Bulb();
		//private var combo:Combo;
		
		/**
		 * Constructor.
		 */
		public function BulbWrapper() {
			
			this.addChild(bulb);
			
			bulb.addEventListener(MouseEvent.CLICK, bulbClick);
			
			
		}
	
		
		/**
		 * Triggered if someone clicks on the light bulb.
		 */
		private function bulbClick(evt:Event):void {
			this.dispatchEvent(new Event("autoSolve"));	
		}
		
	}
	
}