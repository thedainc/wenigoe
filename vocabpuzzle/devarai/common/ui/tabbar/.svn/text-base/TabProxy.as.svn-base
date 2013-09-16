package devarai.common.ui.tabbar {
	
	import flash.display.MovieClip;
	import flash.events.Event;
	import flash.events.MouseEvent;	
	
	
	/**
	 * This is a middle tab.
	 */
	public class TabProxy extends MovieClip {
		
		/**
		 * Constructor.
		 */
		public function TabProxy() {

			selVect.x = 0;
			selVect.y = 0;

			this.mouseChildren = false;
			this.buttonMode= true;
			this.focusRect = false;
			
			this.addEventListener(MouseEvent.CLICK, clicked);
			

		}
		
		/**
		 * Someone clicked on the tab proxy.
		 */
		private function clicked(evt:Event):void {
			this.dispatchEvent(new Event("passOnKey"));
		}
		
		/**
		 * Sets the text.
		 */
		public function set text(val:String):void {
			tex_txt.text = val;
		}
		
		/**
		 * @inheritDoc
		 */
		override public function set width(value:Number):void {
			selVect.width = value;
			tex_txt.y = 6;
			tex_txt.x = 14;
			tex_txt.width = value-8;
		}
		
		/**
		 * @inheritDoc
		 */
		override public function get width():Number {
			return selVect.width;
		}
		
		
	}
	
	
}