package  devarai.common.ui.tabbar {
	
	import flash.display.MovieClip;
	import flash.events.Event;
	import flash.events.MouseEvent;
	
	/**
	 * This is another version of a tab linked to the library.
	 */
	public class TabProxyHalb2 extends MovieClip {
		
		/**
		 * Constructor.
		 */
		public function TabProxyHalb2() {
			
			
			tex_txt.y = 3;
			tex_txt.x = 45;
			
			this.mouseChildren = false;
			this.buttonMode= true;
			this.focusRect = false;
			
			this.addEventListener(MouseEvent.CLICK, clicked);
						

		}
		/**
		 * Someone clicked on the tab
		 */
		private function clicked(evt:Event):void {
			this.dispatchEvent(new Event("passOnKey"));
		}		
		
		/**
		 * @inheritDoc
		 */
		override public function set width(value:Number):void {

			unselVect.width = value;
			
			unselVect.x = 0;
			unselVect.y = 0;
			
			tex_txt.y = 3;
			tex_txt.x = 39;
			tex_txt.width = value-8;
		}
		
		/**
		 * Sets the text of the tab.
		 */		
		public function set text(val:String):void {
			tex_txt.text = val;
		}
		
		/**
		 * @inheritDoc
		 */
		override public function get width():Number {
			return unselVect.width;
		}
		
		
	}
	
	
}