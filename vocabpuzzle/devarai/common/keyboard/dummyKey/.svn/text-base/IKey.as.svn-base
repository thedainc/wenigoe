package devarai.common.keyboard.dummyKey{
	import flash.display.MovieClip;
	
	import flash.display.DisplayObjectContainer;
	
	/**
	 * This is the interface of the Key class.
	 * @see Key
	 */
	public interface IKey {
		/**
		 * This method sets up the event listeners
		 */
		function setListeners():void;
		/**
		 * This method removes the event listeners
		 */
		function removeListeners():void;
		/**
		 * This function resets the timers for a key.
		 * @param waiter This is the time it takes until the key is after being pressed triggered the first time.
		 * @param retrigger After this time interval if pressed the key gets retriggered.
		 */
		function resetTimers(waiter:Number = 500, retrigger:Number = 98):void;
		/**
		 * @private
		 * Used for function keys. Check if a key with a special code is pressed.
		 * @param code A key code.
		 * @return <code>true</code> if pressed.
		 */
		function getKeyPress(code:uint):Boolean;
		
	}
}