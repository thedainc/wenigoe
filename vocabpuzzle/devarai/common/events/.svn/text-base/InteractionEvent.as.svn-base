package devarai.common.events {
	
	import flash.events.Event;
	
	/**
	 * This is an event that is dispatched by some interactive object within the Devarai Framework.
	 */
	public class InteractionEvent  extends Event  {
		
		/**
		 * This event signature is used if the enterkey got pressed while interacting with an object.
		 * (I.e. the PowerTextField dispatches it if you type in text and then press enter) 
		 * @see devarai.common.text.PowerTextField
		 * @eventType devarai.common.events.InteractionEvent.ENTER_PRESSED
		 */
		public static const ENTER_PRESSED:String = "enterPressed";
		
		/**
		 * This event is i.e. in the combo boy dispatched if we select a new row.
		 * @eventType devarai.common.events.InteractionEvent.NEW_SELECT
		 */
		public static const NEW_SELECT:String = "newSelect";
		
		/**
		 * This is the constructor. 
		 * @param type I.e. InteractionEvent.ENTER_PRESSED
		 * @param bubble Bubble ?
		 */
		public function InteractionEvent(type:String, bubble:Boolean = true) {
			super(type, bubble);
		}
		/**
		 * @inheritDoc
		 */
		public override function clone():Event {
			return new InteractionEvent(type);
		}
	}
}


