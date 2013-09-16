package devarai.common.keyboard {
	

	import devarai.common.keyboard.dummyKey.*;
	
	import flash.display.DisplayObjectContainer;
	import flash.display.MovieClip;
	import flash.display.Stage;
	import flash.events.Event;
	import flash.events.EventDispatcher;
	import flash.events.KeyboardEvent;
	import flash.events.MouseEvent;
	import flash.events.TimerEvent;
	import flash.ui.Keyboard;
	import flash.utils.Timer;
	
	
	/**
	 * This is the DummyKeyb class. It handles the keyboard inputs.
	 * @private
	 */
	public class DummyKeyb extends MovieClip {
		
		
		private var myStage:Stage; 
		
		private var altGrPressed: Boolean = false;
		private var altPressed: Boolean = false;
		private var shiftLPressed : Boolean = false;
		private var shiftRPressed : Boolean = false;
		private var ctrlRightPressed : Boolean = false;
		private var ctrlLeftPressed : Boolean = false;
		private var capsLockPressed : Boolean = false;
		
		private var toLeftPressed :Boolean = false;
		private var toRightPressed :Boolean = false;
		
		private var regKey:IKey; 
		
		private var backKey:IKey;
		private var deleteKey:IKey;
		private var spaceKey:IKey;
		private var tabKey:IKey;
		private var enterKey:IKey;
		private var shiftLeftKey:IKey;
		private var ctrlRightKey:IKey;
		private var capsLockKey:IKey;
		
		
		private var toUpPressed : Boolean = false;
		private var toDownPressed:Boolean = false;

				
		private var cleanUpListener:Boolean = false;
		private var timerDelay:Number = 40;
		private var myTimer : Timer;
		private var waiter : Timer;

	
		/**
		 * Constructor.
		 */
		public function DummyKeyb() {
			
		}
		
		
	
		private function setFoc(evt:Event):void {
			this.myStage.stage.focus = this.myStage;
		}
		
		/**
		 * Deinitializes the keyboard manager. That is like removing the event listeners etc.
		 */
		public function deInit():void {
			
			cleanUpRegKeyListeners();
				
			cleanUpListeners();
			listenersOn = false;
			this.myStage.removeEventListener(MouseEvent.MOUSE_DOWN,setFoc);
		
		}
		
		private var listenersOn:Boolean = false;
		
		/**
		 * This method (re-) initialized the keyboard handler.
		 */
		public function construct(theStage:Stage):void {
			
			this.myStage = theStage;
			
			this.regKey = new Key(-1,true,this.myStage);
			backKey = new Key(Keyboard.BACKSPACE,true,this.myStage);
			deleteKey = new Key(Keyboard.DELETE,true,theStage);
			spaceKey = new Key(Keyboard.SPACE,true,theStage);
			tabKey = new Key(Keyboard.TAB,false,theStage);
			enterKey = new Key(Keyboard.ENTER,false,theStage);
			shiftLeftKey = new Key(Keyboard.SHIFT,false,theStage);
			ctrlRightKey = new Key(Keyboard.CONTROL,false,theStage);
			capsLockKey = new Key(Keyboard.CAPS_LOCK,false,theStage);
			
			if (!listenersOn) {

				initListeners();		
				initRegKeyListeners();
				listenersOn = true;
				
				myStage.addEventListener(MouseEvent.MOUSE_DOWN,setFoc);
				setFoc(null);

				waiter = new Timer(500,1);
				myTimer = new Timer(98);
				
				waiter.addEventListener(TimerEvent.TIMER_COMPLETE,timerActive);
				myTimer.addEventListener(TimerEvent.TIMER, timerFunc);

			}
			
						
		}
		
		
		
		private function initRegKeyListeners():void {
			(regKey as EventDispatcher).addEventListener(KeyEvent.NEWINPUT,regKeyInput);
			regKey.setListeners();
		}
		
		private function initListeners():void {
			
			(backKey as EventDispatcher).addEventListener("passOnKey",backKeyInput);
			backKey.setListeners();
			(deleteKey as EventDispatcher).addEventListener("passOnKey",backKeyInput2);
			deleteKey.setListeners();
			
			(spaceKey as EventDispatcher).addEventListener("passOnKey",spaceKeyInput);
			spaceKey.setListeners();
			
			(tabKey as EventDispatcher).addEventListener("passOnKey",tabKeyInput);
			(tabKey as EventDispatcher).addEventListener(KeyEvent.TABKEYRELEASED,tabKeyInput2);
			tabKey.setListeners();
			
			(enterKey as EventDispatcher).addEventListener("passOnKey",enterKeyInput);
			enterKey.setListeners();
			
			
			(shiftLeftKey as EventDispatcher).addEventListener("passOnKey",shiftKeyInputL);
			shiftLPressed = false;
			shiftLeftKey.setListeners();
			
		
			(ctrlRightKey as EventDispatcher).addEventListener("passOnKey",ctrlRightInput);
			ctrlRightPressed = false;
			ctrlRightKey.setListeners();
					
			capsLockKey.setListeners();
			(capsLockKey as EventDispatcher).addEventListener("passOnKey",capsLockInput);
			capsLockPressed = Keyboard.capsLock;
			
			
			myStage.stage.addEventListener(KeyboardEvent.KEY_DOWN,statusArrowKeyDown,false,0,true);
			myStage.stage.addEventListener(KeyboardEvent.KEY_UP,statusArrowKeyUp,false,0,true);
			
			myStage.stage.addEventListener(KeyboardEvent.KEY_UP,homeEndKeyUp, false,0,true);
			myStage.stage.addEventListener(KeyboardEvent.KEY_DOWN,homeEndKeyDown, false,0,true);
			
			myStage.stage.addEventListener(KeyboardEvent.KEY_UP,pageKeyUp,false,0,true);
			myStage.stage.addEventListener(KeyboardEvent.KEY_DOWN,pageKeyDown, false,0,true);
			
		}
		
		private function cleanUpRegKeyListeners():void {
		
			(regKey as EventDispatcher).removeEventListener("passOnKey",regKeyInput);
			regKey.removeListeners();
		
		}
		
		private function cleanUpListeners():void {
			
			
			(backKey as EventDispatcher).removeEventListener("passOnKey",backKeyInput);
			backKey.removeListeners();
			(deleteKey as EventDispatcher).removeEventListener("passOnKey",backKeyInput2);
			deleteKey.removeListeners();
			
			(spaceKey as EventDispatcher).removeEventListener("passOnKey",spaceKeyInput);
			spaceKey.removeListeners();
			
			(tabKey as EventDispatcher).removeEventListener("passOnKey",tabKeyInput);
			(tabKey as EventDispatcher).removeEventListener(KeyEvent.TABKEYRELEASED,tabKeyInput2);
			tabKey.removeListeners();
			
			(enterKey as EventDispatcher).removeEventListener("passOnKey",enterKeyInput);
			enterKey.removeListeners();
			
			
			(shiftLeftKey as EventDispatcher).removeEventListener("passOnKey",shiftKeyInputL);
			shiftLeftKey.removeListeners();
			
			
			(ctrlRightKey as EventDispatcher).removeEventListener("passOnKey",ctrlRightInput);
			ctrlRightKey.removeListeners();
			
			capsLockKey.removeListeners();
			(capsLockKey as EventDispatcher).removeEventListener("passOnKey",capsLockInput);
			
			myStage.stage.removeEventListener(KeyboardEvent.KEY_DOWN,statusArrowKeyDown);
			myStage.stage.removeEventListener(KeyboardEvent.KEY_UP,statusArrowKeyUp);
			
			myStage.stage.removeEventListener(KeyboardEvent.KEY_UP,homeEndKeyUp);
			myStage.stage.removeEventListener(KeyboardEvent.KEY_DOWN,homeEndKeyDown);
			
		}
		
				
		
		private function regKeyInput(evt:KeyEvent):void {
			
			var i:int;

			dispatchEvent(new KeyEvent(KeyEvent.NEWINPUT,evt.char));
			
			// Do something with the input
			
			
			
		}
		// ENTF Key
		private function backKeyInput2(evt:Event):void {
			dispatchEvent(new Event("entf",true));
		}
		
		/**
		 * Processing of the delete backspace key.
		 * @private
		 * @param evt Mostly this method is triggered by an event.
		 * @param passon <code>true</code> if all associated TextFields and so on should be notified and adapted
		 * @param noentf 
		 * 
		 */
		public function backKeyInput(evt:Event, passon:Boolean = true):void {
		
			var i:int;
		
			dispatchEvent(new Event("backspace",true));
			
			// Someone pressed delete... do something about it
			
		}
		
		private function spaceKeyInput(evt:Event):void {
		}		
		private function tabKeyInput(evt:Event):void {
		}
		private function tabKeyInput2(evt:Event):void {
			
		}
		private function enterKeyInput(evt:Event):void {
			dispatchEvent(new Event("enter",true));
			
		}
		
		
		private function shiftKeyInputL(evt:Event):void {
					
			shiftLPressed = (evt.currentTarget as IKey).getKeyPress(Keyboard.SHIFT);
			
		}
		private function shiftKeyInputR(evt:Event):void {
			
			shiftRPressed = (evt.currentTarget as IKey).getKeyPress(Keyboard.SHIFT);
			
		}
		private function altGrInput(evt:Event):void {
			
			altGrPressed = !altGrPressed;
			
			
		}
		
		private function altInput(evt:Event):void {
			
			altPressed = !altPressed;
			
			
		}
		private function pageKeyDown(evt:KeyboardEvent):void {
			
		}
		private function homeEndKeyDown(evt:KeyboardEvent):void {
		}
		private function pageKeyUp(evt:KeyboardEvent):void {
		
		}
		
		private function homeEndKeyUp(evt:KeyboardEvent):void {
		}
		
		private function ctrlRightInput(evt:Event):void {
			ctrlRightPressed = (evt.currentTarget as IKey).getKeyPress(Keyboard.CONTROL);
		}
		
		private function ctrlLeftInput(evt:Event):void {
			
			ctrlLeftPressed = (evt.currentTarget as IKey).getKeyPress(Keyboard.CONTROL);;
		}
		private function capsLockInput(evt:Event):void {
			
			capsLockPressed = Keyboard.capsLock;
		}
		
		/**
		 * Timer function for eventually retriggering the arrow keys.
		 */
		private function timerFunc(evt:TimerEvent):void {
			
			if (toLeftPressed && toRightPressed);
			else if (toLeftPressed) { arrowUpFunc(Keyboard.LEFT);  }
			else if (toRightPressed) { arrowUpFunc(Keyboard.RIGHT);  }
			
			if (toUpPressed && toDownPressed);
			else if (toUpPressed) { arrowUpFunc(Keyboard.UP);  }
			else if (toDownPressed) { arrowUpFunc(Keyboard.DOWN);  }
		}
		
		private function timerActive(evt:TimerEvent):void {
			
			myTimer.start();
		}
		
		
		/**
		 * A arrow key was pressed. Start the timer and so...
		 */
		private function statusArrowKeyDown( evt : KeyboardEvent):void {
			
			if (evt.keyCode == Keyboard.LEFT) {
				toLeftPressed = true;
				waiter.start();
			}
			if (evt.keyCode == Keyboard.RIGHT) {
				toRightPressed = true;
				waiter.start();
				
			}
			if (evt.keyCode == Keyboard.UP) {
				toUpPressed = true;
				waiter.start();
			}
			if (evt.keyCode == Keyboard.DOWN) {
				toDownPressed = true;
				waiter.start();
				
			}
			
			
		}

		/**
		 * Arrow key was released. Do something about it.
		 */
		private function arrowUpFunc( code: Number, selectF:Boolean = true ):void {

			var i:int;
			var tempStr : String;
			
			
			if (code == Keyboard.UP) {
				dispatchEvent(new Event("pressUp",true));
			}
			
			if (code == Keyboard.DOWN) {
				dispatchEvent(new Event("pressDown",true));
			}
			
			if (code == Keyboard.LEFT) {
				
				
				dispatchEvent(new Event("arrowLeft",true));
				
			}
			if (code == Keyboard.RIGHT) {

				dispatchEvent(new Event("arrowRight",true));
				
				
			}
			
		}
		
		private function statusArrowKeyUp( evt: KeyboardEvent):void {
			
			arrowUpFunc(evt.keyCode);
			
			if (evt.keyCode == Keyboard.LEFT) {
				toLeftPressed = false;
				waiter.stop();myTimer.stop();
			}
			if (evt.keyCode == Keyboard.RIGHT) {
				toRightPressed = false;
				waiter.stop();myTimer.stop();
			}
			if (evt.keyCode == Keyboard.UP) {
				toUpPressed = false;
				waiter.stop();myTimer.stop();
			}
			if (evt.keyCode == Keyboard.DOWN) {
				toDownPressed = false;
				waiter.stop();myTimer.stop();
			}
		}
		
		
	}
}
