package  devarai.common.ui.tabbar {
	
	import flash.display.MovieClip;
	import flash.events.Event;
	import flash.events.MouseEvent;

	/**
	 * This a a version of a tab linked to a library symbol.
	 */
	public class TabProxyHalb extends MovieClip {
		
		/**
		 * Constructor.
		 */
		public function TabProxyHalb() {

			tex_txt.y = 3;
			tex_txt.x = 16;
			unselVect.x = 0;
			unselVect.y = 0;
			
			this.mouseChildren = false;
			this.buttonMode= true;
			this.focusRect = false;
			
			this.addEventListener(MouseEvent.CLICK, clicked);
			
			
		}
		
		/**
		 * Someone clicked on the tab.
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
			tex_txt.x = 14;
			tex_txt.width = value-8;
		}
		
		/**
		 * Sets the text of the tab.
		 */
		public function set text(val:String):void {
			tex_txt.text = val;
		}
		
		/**
		 * @inheritDoc.
		 */
		override public function get width():Number {
			return unselVect.width
		}
		
		
	}
	
	
}