package devarai.common.keyboard.dummyKey {

	
	import flash.display.DisplayObjectContainer;
	import flash.display.MovieClip;
	import flash.display.Stage;
	import flash.events.Event;
	import flash.events.EventDispatcher;
	import flash.events.KeyboardEvent;
	import flash.events.TextEvent;
	import flash.events.TimerEvent;
	import flash.geom.Rectangle;
	import flash.text.TextField;
	import flash.text.TextFormat;
	import flash.ui.Keyboard;
	import flash.utils.Dictionary;
	import flash.utils.Timer;
	
	/**
	 * This is the Key class used my the keyboard input manager.
	 * @see IKey
	 * 
	 */
	public class Key extends EventDispatcher implements IKey {
		
		private var keyPressed:Dictionary = new Dictionary();
		
		private var timerDelay:Number = 60;
		private var myTimer : Timer;
		private var waiter : Timer;
		
		private var stag:Stage;
		
		private var lastCharPressed:Vector.<String> = new Vector.<String>();
		
		private var _keycode:int = -1;
		private var _retrigger:Boolean = true;
		
		//private var allowedChars:String = "'<>\"`1!2@3#4$5%6^7&8*9(0)-_=+\\|{}[]qQwWeErRtTyYuUiIoOpPaAsSdDfFgGhHjJkKlL;:zZxXcCvVbBnNmM,./?\\äüöÄÖÜß€";
		
		/**
		 * @copy IKey#resetTimers()
		 */
		public function resetTimers(wait:Number = 500, retrigger:Number = 98):void {
			if (waiter) waiter.delay = wait;
			if (myTimer) myTimer.delay = retrigger;
		}
		
				
		/**
		 * This is the constructor of the Key class.
		 * @param keycode If you want to trigger for function keys you provide here the key keyCode. Otherwise this instance triggeres for regular keys.
		 * @param retrigger Is <code>true</code> if a pressed key should be retriggered automatically. 
		 */
		public function Key(keycode:int =-1, retrigger:Boolean = true, sta:Stage= null) {
			
			
			this.stag = sta;
			
	

			_retrigger = retrigger;
			_keycode = keycode;
			
					
			
			waiter = new Timer(500,1);
			myTimer = new Timer(98);
			
			waiter.addEventListener(TimerEvent.TIMER_COMPLETE,timerActive);
			myTimer.addEventListener(TimerEvent.TIMER, timerFunc);
			
		}
		
		/**
		 * @copy IKey#setListeners()
		 */
		public function setListeners():void {
			
			
			if (_keycode == -1) stag.addEventListener(TextEvent.TEXT_INPUT, textin);
			
			stag.addEventListener(KeyboardEvent.KEY_DOWN,statusKeyDown,false,0,true);
			stag.addEventListener(KeyboardEvent.KEY_UP,statusKeyUp,false,0,true);

		}
		
		
		/**
		 * @copy IKey#removeListeners()
		 */
		public function removeListeners():void {

			stag.removeEventListener(TextEvent.TEXT_INPUT,textin);
			
			stag.removeEventListener(KeyboardEvent.KEY_DOWN,statusKeyDown);
			stag.removeEventListener(KeyboardEvent.KEY_UP,statusKeyUp);
			
		}
		
		
		/**
		 * Processes a text event of the Flash build in keyboard handler.
		 */
		private function textin(evt:TextEvent):void {
			
	
			var lastChar:String = ""; 
			

			for (var i:int = 0 ; i<evt.text.length; i++) {
				
				var text:String = evt.text.charAt(i);
				
				if (lastCharPressed.length >1 ) {
					for (var j:int =  0; j<lastCharPressed.length; j++) {
						lastChar+=lastCharPressed[j];
					}
				}
				
				
				if (lastChar!=evt.text)					
					
					if (isallowedchar(""+text)) { 
						
						keyPressed[""+text] = true;
						keyPressed[""+text] = true;
						
						lastCharPressed.push(""+text);
						passOnKey(""+text);
						
						myTimer.stop();
						
						if (_retrigger) waiter.start(); 
					}
	
			}
				
		
		}
		
		
		
		/**
		 * Checks if a char is valid. 
		 *  What means that it has to be embedded int normal, bold, cursive, cursive+bold
		 */
		private function isallowedchar(ch:String):Boolean {
			
			
			
			return true;
			
		}
		
		
		private function timerFunc(evt:TimerEvent):void {
			
			if (lastCharPressed.length>0) 
				for (var i:int = 0; i<lastCharPressed.length; i++) {
					if (keyPressed[""+lastCharPressed[i]]) passOnKey(lastCharPressed[i]);	
				}
		}
		
		private function timerActive(evt:TimerEvent):void {
			waiter.stop();
			myTimer.start();
		}
		
		
		/**
		 * Dispatches the regular NEWINPUT event.
		 * @param char The new input | a message to be dispatched
		 */
		private function passOnKey(char:String):void {
			dispatchEvent(new KeyEvent(KeyEvent.NEWINPUT,char));
		}
		
		

		/**
		 * This function gets called if a key on the keyboard get pressed.
		 * If it is a key we take care of we start the timers and eventually dispatch a KeyEvent at once.
		 * @param evt KeyboardEvent.
		 */
		private function statusKeyDown(evt:KeyboardEvent):void {
		 	
			
			if (_keycode != -1) {
				if (!keyPressed[""+_keycode] || _keycode == Keyboard.ENTER) {


					var wahr:Boolean = false;
					
					if (_keycode == Keyboard.CONTROL && evt.ctrlKey) wahr = true;
					else if (_keycode == Keyboard.SHIFT && evt.shiftKey) wahr = true;
					else if (_keycode != Keyboard.SHIFT && _keycode != Keyboard.CONTROL	&& evt.keyCode == _keycode) wahr = true;
					
					if (wahr) {
						
						keyPressed[""+_keycode] = true;
						
						lastCharPressed.push(""+_keycode);
						
						passOnKey(""+_keycode);
						
						myTimer.stop();
						
												
						if (_retrigger) waiter.start();
					}
				}
			
			} else {
				var char:String = String.fromCharCode(evt.charCode);
				
				if (char.toLowerCase()=="c" || char.toLowerCase()=="v") {
					if (!keyPressed[""+evt.charCode]) {
						passOnKey("copypaste"+char);
						myTimer.stop();
						

					}
				}
			}
		}
		
		
		
		/**
		 * @copy IKey#getKeyPress()
		 */
		public function getKeyPress(code:uint):Boolean {
			return keyPressed[""+code];
			
		}


		/**
		 * Gets triggered if a key is released. It checks then if an event has to be dispatched so
		 * the keyboard input manager has to react.
		 * @param evt A KeyboardEvent.
		 */
		private function statusKeyUp(evt:KeyboardEvent):void {
			
			
			if (_keycode != -1) {

				var wahr:Boolean = false;
					
				if (_keycode == Keyboard.CONTROL && !evt.ctrlKey) wahr = true;
				else if (_keycode == Keyboard.SHIFT && !evt.shiftKey) wahr = true;
				
					
				if ((evt.keyCode == _keycode || wahr) && keyPressed[""+_keycode]) {
					
					keyPressed[""+_keycode] =  false;
					
					if (_keycode == Keyboard.SHIFT || _keycode == Keyboard.CONTROL) passOnKey(""+evt.keyCode);
					else if (_keycode == Keyboard.TAB) {
						this.dispatchEvent(new Event(KeyEvent.TABKEYRELEASED,true))
					}
				}
				
				waiter.stop();myTimer.stop();
			}
			
			if (_keycode == -1) {
				
				
				for (var i:int = 0; i<lastCharPressed.length; i++) {
					var char:String = lastCharPressed.pop();				
					if (isallowedchar(""+char)) { 
						
						keyPressed[""+char] =  false;
						
					}
				}
				
				waiter.stop();myTimer.stop();
			}
		}
		
	}
}