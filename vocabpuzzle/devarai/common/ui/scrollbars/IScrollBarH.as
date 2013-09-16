package devarai.common.ui.scrollbars {
	

	import flash.display.MovieClip;

	/**
	 * This interface has to be implemented by classes that want to have a horizontal scroll bar.
	 */
	public interface IScrollBarH {
		
	
		/**
		 * @return The horizontal scrolling position.
		 */
		function get scrollPosH():Number;
		/**
		 * Sets the horizontal scrolling position.
		 * @param n Position. >=0 and <= maxScrollPosH
		 * @see IScrollBarH#maxScrollPosH()
		 */
		function set scrollPosH(n:Number):void;
		
		/**
		 * This method gives us the maximum horizontal scrolling position.
		 * @return maximum.
		 */
		function get maxScrollPosH():Number;
		/**
		 * Scrolling page width in pixels.
		 */
		function get pageWidth():Number;
	}
	
	
}