package devarai.common.ui.scrollbars {
	

	/**
	 * This is the interface a display object has to implement if it intents to support a vertical scrollbar.
	 */
	public interface IScrollBar {
		
		/**
		 * This gives you the a vertical scroll position
		 * @return position
		 */		
		function get scrollPosV():Number;
		/**
		 * This sets a vertical scroll position
		 * @param n Position (>=0 and <=maxScrollPosV())
		 * @see IScrollBar#maxScrollPosV()
		 */
		function set scrollPosV(n:Number):void;
		/**		
		 * Gives you the maximum possible scroll position.
		 * @return Max. scroll position.
		 */
		function get maxScrollPosV():Number;
		
		/**
		 * Scrolling page height in pixels.
		 */
		function get pageHeight():Number;
		
	}
	
}