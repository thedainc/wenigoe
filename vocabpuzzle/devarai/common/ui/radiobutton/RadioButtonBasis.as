package devarai.common.ui.radiobutton {
	
	import flash.display.MovieClip;
	import flash.events.MouseEvent;
	import flash.events.Event;
	import flash.text.TextField;
	import flash.text.TextFieldAutoSize;
	import devarai.common.ui.radiobutton.IRadioButton;

	/**
	 * Class for an elementary radio button.
	 */
	public class RadioButtonBasis extends MovieClip implements IRadioButton {
		
		public var disabled: Boolean = false;
		
		private var _activated: Boolean = false;
		
		
		/**
		 * @copy IRadioButton#activated()
		 */
		public function get activated():Boolean {
			return _activated;
		}
		
		/**
		 * @copy IRadioButton#activated()
		 */
		public function set activated(b:Boolean):void {
			
			if (disabled) return;
			_activated = b;
			
			if (_isMouseOver) _mouseOnButton(null);
			else _mouseOutofButton(null);
		}
		
		/**
		 * @copy IRadioButton#textfield()
		 */
		public function get textfield():TextField {
			return tex_txt;
		}
		
		
		private var _isMouseOver:Boolean = false;
		private var _mouseReleased:Boolean = false;
		
		
		/**
		 * Constructor.
		 * @param s The text associated with the button.
		 */
		public function RadioButtonBasis(s:String) {

			
			tex_txt.x = 23;
			tex_txt.y = -2;
			tex_txt.text = s;
			tex_txt.autoSize = TextFieldAutoSize.LEFT;
			
			pressed_mc.x = 0;
			pressed_mc.y = 0;
			disabled_mc.x = 0;
			disabled_mc.y = 0;
			over_mc.x  = 0;
			over_mc.y = 0;
			up_mc.x = 0;
			up_mc.y = 0;
			
			selectedPressed_mc.x = 0;
			selectedPressed_mc.y = 0;
			selectedDisabled_mc.x = 0;
			selectedDisabled_mc.y = 0;
			selectedOver_mc.x  = 0;
			selectedOver_mc.y = 0;
			selectedUp_mc.x = 0;
			selectedUp_mc.y = 0;

			over_mc.visible = false;
			disabled_mc.visible = false;
			up_mc.visible  = true;
			pressed_mc.visible = false;
			
			selectedDisabled_mc.visible = false;
			
			selectedOver_mc.visible = false;
			
			selectedUp_mc.visible  = false;
			selectedPressed_mc.visible = false;

			this.buttonMode = true;
			this.focusRect = false;
			this.mouseChildren = false;
			
			this.addEventListener(MouseEvent.MOUSE_OVER, _mouseOnButton);
			this.addEventListener(MouseEvent.MOUSE_OUT, _mouseOutofButton);
			
			addEventListener(MouseEvent.MOUSE_DOWN, _mouseButton);
			addEventListener(MouseEvent.MOUSE_UP, _mouseButtonReleased);			
			
		}
		
		
		/**
		 * Triggered if someone clicks
		 */
		private function passOnKey():void {
			
			var evt : Event = new Event("passOnKey",true);
			
			dispatchEvent(evt);
		}

		
		/**
		 * Disables the radio button.
		 */
		public function disableButton():void {
				disabled = true;

				over_mc.visible = false;
				disabled_mc.visible = false;
				up_mc.visible  = false;
				pressed_mc.visible = false;

				selectedOver_mc.visible = false;
				selectedDisabled_mc.visible = false;
				selectedUp_mc.visible  = false;
				selectedPressed_mc.visible = false;

				if (!_activated) disabled_mc.visible = true;
				else selectedDisabled_mc.visible = true;


		}

		/**
		 * Enables the radiobutton.
		 */
		public function enableButton():void {
				disabled = false;
				over_mc.visible = false;
				disabled_mc.visible = false;
				up_mc.visible  = false;
				pressed_mc.visible = false;

				selectedOver_mc.visible = false;
				selectedDisabled_mc.visible = false;
				selectedUp_mc.visible  = false;
				selectedPressed_mc.visible = false;

				if (!_activated) up_mc.visible = true;
				else selectedUp_mc.visible = true;
				//passOnKey();
			
		}

		
		/**
		 * Mouse button pressed on button ?
		 */
		private function _mouseButton(evt:MouseEvent):void {
			if (disabled) return;	
				
				over_mc.visible = false;
				disabled_mc.visible = false;
				up_mc.visible  = false;
				pressed_mc.visible = false;

				selectedOver_mc.visible = false;
				selectedDisabled_mc.visible = false;
				selectedUp_mc.visible  = false;
				selectedPressed_mc.visible = false;


				if (!_activated) pressed_mc.visible = true;
				else selectedPressed_mc.visible = true;
				
				

			_mouseReleased = false;
		}
		
		/**
		 * Mouse button released on button ?
		 */
		private function _mouseButtonReleased(evt:MouseEvent):void {

			if (disabled) return;

				over_mc.visible = false;
				disabled_mc.visible = false;
				up_mc.visible  = false;
				pressed_mc.visible = false;

				selectedOver_mc.visible = false;
				selectedDisabled_mc.visible = false;
				selectedUp_mc.visible  = false;
				selectedPressed_mc.visible = false;

			if (!_isMouseOver) {
				if (activated) {
					selectedUp_mc.visible = true;
				} else {
					up_mc.visible = true;
				}
					
			} 
			else {
				if (_activated) {
					selectedOver_mc.visible = true;
				} else {
					over_mc.visible = true;
				}
				
			}



			_mouseReleased = true;
			passOnKey();
		}
		
		/**
		 * Mouse over button ?
		 */
		private function _mouseOnButton(evt:Event):void {
			
			if (disabled) return;

				over_mc.visible = false;
				disabled_mc.visible = false;
				up_mc.visible  = false;
				pressed_mc.visible = false;

				selectedOver_mc.visible = false;
				selectedDisabled_mc.visible = false;
				selectedUp_mc.visible  = false;
				selectedPressed_mc.visible = false;



				if (!_activated) over_mc.visible = true;
				else selectedOver_mc.visible = true;

			_isMouseOver = true;

		}
		/**
		 * Mouse out of button?
		 */
		private function _mouseOutofButton(evt:Event):void {

			if (disabled) return;
			
				over_mc.visible = false;
				disabled_mc.visible = false;
				up_mc.visible  = false;
				pressed_mc.visible = false;

				selectedOver_mc.visible = false;
				selectedDisabled_mc.visible = false;
				selectedUp_mc.visible  = false;
				selectedPressed_mc.visible = false;

				if (!_activated) up_mc.visible = true;
				else selectedUp_mc.visible = true;
			

			_isMouseOver = false;


		}	
	}
	
	
	
}