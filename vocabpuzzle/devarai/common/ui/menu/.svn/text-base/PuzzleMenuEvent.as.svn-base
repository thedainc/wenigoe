package devarai.common.ui.menu {
	
	import flash.events.Event;
	
	/**
	 * This is an event that is dispatched by the menu class
	 */
	public class PuzzleMenuEvent extends Event  {
		
		private var _word:String;
		
		/**
		 * This event is dispatched if someone selects and clicks on an entry
		 */
		public static const NEW_SELECT:String = "newSelect";
		
		/**
		 * This is the constructor. 
		 * @param type I.e. InteractionEvent.ENTER_PRESSED
		 * @param bubble Bubble ?
		 */
		public function PuzzleMenuEvent(type:String, word:String, bubble:Boolean = false) {
			_word = word;
			super(type, bubble);
		}
		
		/**
		 * The word that got clicked.
		 */
		public function get word():String {
			return this._word;
		}
		
		/**
		 * @inheritDoc
		 */
		public override function clone():Event {
			return new PuzzleMenuEvent(type,_word);
		}
	}
	
	
	
	
}