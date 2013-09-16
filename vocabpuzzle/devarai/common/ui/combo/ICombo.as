package devarai.common.ui.combo {
	
	/**
	 * Interface of the combo box.
	 * @see Combo
	 */
	public interface ICombo {
		/**
		 * Adds a row to the combo box list.
		 * @param s The content of this row (text).
		 */
		function addEntry(s:String):void;
		/**
		 * Empties the combo box list completely.
		 */
		function empty():void;
		/**
		 * @return Gives you the selection info. I.e. [2,"Hello"] where "2" says that row index 2 is selected. Content of this cell is "Hello".
		 */
		function get aktSelected():Array;
		/**
		 * Selects row with index [i]
		 * @param a Array with one element like "[2]". "2" is the index as an int.
		 */
		function set aktSelected(a:Array):void;

	}
}