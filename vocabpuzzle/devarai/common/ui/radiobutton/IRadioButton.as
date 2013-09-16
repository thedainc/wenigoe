package devarai.common.ui.radiobutton {
	
	
	import flash.text.TextField;
	
	/**
	 * Interface for a radio button object.
	 */
	public interface IRadioButton {
		
		
		/**
		 * @return true whether this button is activated.
		 */
		function get activated():Boolean;
		
		/**
		 * Sets this button as activated.
		 */
		function set activated(b:Boolean):void;
		
		/**
		 * @return Gives the textField associated with this button.
		 */
		function get textfield():TextField;

	}
	
	
}