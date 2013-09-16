package devarai.common.ui.radiobutton {
	
	import flash.events.EventDispatcher;
	import flash.events.Event;
	import devarai.common.ui.radiobutton.IRadioButton;
	
	/**
	 * This class groups radio buttons together.
	 */
	public class RadioButtonGroup {
		
		private var mybuttons:Array = new Array();		
		private var _aktiv:int = -1;
		
		/**
		 * Which button is activated?
		 * @return The index.
		 */
		public function get aktiv():int {
			return _aktiv;
		}
		/**
		 * Sets a button with a special index activated.
		 * @param ind Index.
		 */
		public function set aktiv(ind:int):void {
			for (var i = 0; i<mybuttons.length; i++) {
				if (i != ind) mybuttons[i].activated = false;
				else mybuttons[i].activated = true;
			}
			
		}
		/**
		 * Adds a button to the group.
		 * @param butt Button.
		 */
		public function addButton(butt:IRadioButton):void {
			if (_aktiv==-1) {
				butt.activated = true;
				_aktiv = mybuttons.length;
			}
			mybuttons.push(butt);
			(butt as EventDispatcher).addEventListener("passOnKey",activateOne);
		}
		
		/**
		 * Triggered if something happens to a button.
		 */
		private function activateOne(evt:Event):void {
			
			for (var i = 0; i<mybuttons.length; i++) {
				if (mybuttons[i]!=evt.currentTarget) mybuttons[i].activated = false;
				else { mybuttons[i].activated = true; _aktiv = i;}
			}
			
		}
				
		
	}
	
	
	
}