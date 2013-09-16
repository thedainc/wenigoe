package devarai.common.keyboard.dummyKey {
	
	
	import flash.events.Event;

	/**
	 * This is an event class for the keyboard input manager.
	 * @see devarai.common.keyboard.ADummyKeyboard
	 * @see devarai.common.keyboard.DummyKeyb
	 * 
	 */
	public class KeyEvent extends Event {
		
		public static var NEWINPUT:String = "passOnKey";
		public static var TABKEYRELEASED = "TAB2";
		
		private var _char : String;
		
		/**
		 * The constructor.
		 * @param eventName The type like KeyEvent.NEWINPUT
		 * @param ch The new input.
		 */
		public function KeyEvent(eventName:String, ch:String) {
			super(eventName,true);
			_char = ch;
		}
		
		/**
		 *  @return The new input.
		 */
		public function get char():String {
			return _char;
		}
	
	}
	
}