package devarai.common.ui.combo {
	
	import flash.display.MovieClip;
	import flash.events.Event;
	import flash.events.MouseEvent;
	import flash.filters.DropShadowFilter;
	import flash.text.TextField;
	
	/**
	 * This is the lowest display element of the combobox. It is a cell/row that takes some text as content.
	 * @see Combo
	 * @private 
	 */
	public class CellBasis extends MovieClip {
		
		private var select:Boolean = false;
		private var mouseOv:Boolean = false;
		
		/**
		 * For internal use. 
		 * @private
		 */
		public static var arrowAction : Boolean = false;
		
		private var tex:TextField;
		private var up_mc:MovieClip;
		private var over_mc:MovieClip;
		private var down_mc:MovieClip;
		private var selected_mc:MovieClip;
		
		/**
		 * @return <code>true</code> is this cell is selected right now.
		 * @private
		 */
		public function get iAmSelect():Boolean {
			return select;
		}
		
		/**
		 * Sets the text content.
		 * @param s The text.
		 * 
		 */
		public function set text(s:String) {
			tex.text  = s;
		}
		/**
		 * @return The content (text) of this cell.
		 */
		public function get text():String {
			return tex.text;
		}
		/**
		 * @inheritDoc
		 */
		override public function set width(value:Number):void {
			var breite:Number = value;
			up_mc.width = breite;
			over_mc.width = breite;
			down_mc.width = breite;
			selected_mc.width = breite;
			tex.width = breite-2;
			
		}

		/**
		 * Constructor.
		 * @param breite The initial width in pixels.
		 */
		public function CellBasis(breite:Number = 200) {
			
			up_mc = this.getChildByName("_up_mc") as MovieClip;
			tex = this.getChildByName("_tex") as TextField;
			over_mc = this.getChildByName("_over_mc") as MovieClip;
			down_mc = this.getChildByName("_down_mc") as MovieClip;
			selected_mc = this.getChildByName("_selected_mc") as MovieClip;
			
			up_mc.x = 0;
			up_mc.y = 0;
			up_mc.width = breite;
			over_mc.x = 0;
			over_mc.y = 0;
			over_mc.width = breite;
			down_mc.x = 0;
			down_mc.y = 0;
			down_mc.width = breite;
			selected_mc.x = 0;
			selected_mc.y = 0;
			selected_mc.width = breite;
			
			this.filters = [new DropShadowFilter(0,115,0x000000,0.6,5,5,0.9,3)];

			
			this.mouseChildren = false;
			over_mc.alpha = 0;
			selected_mc.alpha = 0;
			down_mc.alpha = 0;
			tex.text = "Test";
			tex.x = 3;
			tex.y = 2;
			tex.width = breite-2;
			
			this.addEventListener(MouseEvent.MOUSE_OVER, overfct);
			this.addEventListener(MouseEvent.MOUSE_OUT, outfct);
			this.addEventListener(MouseEvent.MOUSE_DOWN, dwnfct);
			this.addEventListener(MouseEvent.MOUSE_UP, upfct);
			
			
		}
		
		/**
		 * Force the selection of this cell.
		 */
		public function selectMe():void {
			select = true;
			tex.alpha = 1;
			over_mc.alpha = 0;
			up_mc.alpha = 0;
			selected_mc.alpha = 1;
			down_mc.alpha = 0;				
		}
		
		/**
		 * Force the unselection of this cell.
		 */
		public function unSelectMe() {
			select = false;
			if (mouseOv) { over_mc.alpha = 1; up_mc.alpha = 0;}
			else { over_mc.alpha = 0;up_mc.alpha = 1;}
			
			selected_mc.alpha = 0;
			down_mc.alpha = 0;	
			
		}
		
		private function overfct(evt:Event):void {
			
			if (arrowAction) return;
			
			mouseOv = true;
			over_mc.alpha = 1;
			up_mc.alpha = 0;
			selected_mc.alpha = 0;
			down_mc.alpha = 0;	
		}
		
		private function outfct(evt:Event):void {
			mouseOv = false;
			over_mc.alpha = 0;
			down_mc.alpha = 0;	

			if (select) {
				up_mc.alpha = 0;
				selected_mc.alpha = 1;
			} else {
				up_mc.alpha = 1;
				selected_mc.alpha = 0;
				
			}

		}
		
		private function dwnfct(evt:Event):void  {
			over_mc.alpha = 0;
			up_mc.alpha = 0;	
			selected_mc.alpha = 0;
			down_mc.alpha = 1;	
		}
		
		private function upfct(evt:Event):void {
			
			over_mc.alpha = 0;
			down_mc.alpha = 0;	

			if (select) {
				up_mc.alpha = 0;
				selected_mc.alpha = 1;
			} else {
				up_mc.alpha = 1;
				selected_mc.alpha = 0;
				
			}
			
			if (mouseOv) overfct(null);
			
			this.dispatchEvent(new Event("cellClick",true));
		}
		
		
		
		
	}
	
	
}
