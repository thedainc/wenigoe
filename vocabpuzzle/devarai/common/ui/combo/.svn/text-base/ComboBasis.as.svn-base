package devarai.common.ui.combo {
	
	
	import flash.display.MovieClip;
	import flash.events.Event;
	import flash.events.MouseEvent;
	import flash.filters.DropShadowFilter;
	import flash.text.TextField;
	
	/**
	 * This is the display object for the combo box button.
	 * It is responsible for showing the tooltip too.
	 */
	public class ComboBasis extends MovieClip {
		
		private var disabled:Boolean = false;
		private var mouseOv:Boolean = false;
		
		private var disabled_mc:MovieClip;
		private var down_mc:MovieClip;
		private var over_mc:MovieClip;
		private var up_mc:MovieClip;
		private var tex:TextField;

				
		/**
		 * Constructor.
		 * @param breite Initial width in pixels.
		 */
		public function ComboBasis(breite:Number = 200) {
			
			disabled_mc = this.getChildByName("_disabled_mc") as MovieClip;
			down_mc = this.getChildByName("_down_mc") as MovieClip;
			up_mc = this.getChildByName("_up_mc") as MovieClip;
			over_mc = this.getChildByName("_over_mc") as MovieClip;
			tex = this.getChildByName("_tex") as TextField;
			
			//this.filters = [new DropShadowFilter(1,115,0x000000,0.3,4,4,0.95,3)];
			
			up_mc.x = 0;
			up_mc.y = 0;
			up_mc.width = breite;
			over_mc.x = 0;
			over_mc.y = 0;
			over_mc.width = breite;
			down_mc.x = 0;
			down_mc.y = 0;
			down_mc.width = breite;
			disabled_mc.x = 0;
			disabled_mc.y = 0;
			disabled_mc.width = breite;
			
			this.mouseChildren = false;
			over_mc.alpha = 0;
			disabled_mc.alpha = 0;
			down_mc.alpha = 0;
			tex.text = "Test";
			tex.x = 3;
			tex.y = 1;
			tex.width = breite-28;
			
			this.addEventListener(MouseEvent.MOUSE_OVER, overfct);
			this.addEventListener(MouseEvent.MOUSE_OUT, outfct);
			this.addEventListener(MouseEvent.MOUSE_DOWN, dwnfct);
			this.addEventListener(MouseEvent.MOUSE_UP, upfct);
			
			
		}
		
		/**
		 * Set the content of the button.
		 * @param s The text as String.
		 */
		public function set text(s:String):void {
			tex.text = s;
		}
		/**
		 * Enables the button for interaction.
		 */
		public function enableButton():void {
			disabled = false;
			tex.alpha = 1;
			over_mc.alpha = 0;
			up_mc.alpha = 1;
			disabled_mc.alpha = 0;
			down_mc.alpha = 0;				
		}
		
		/**
		 * Disables the button for interaction.
		 */
		public function disableButton():void {
			disabled = true;
			tex.alpha = 0.4;
			over_mc.alpha = 0;
			up_mc.alpha = 0;
			disabled_mc.alpha = 1;
			down_mc.alpha = 0;	
			
		}
		
		private function overfct(evt:Event):void {

			mouseOv = true;
			if (disabled ) return;			
			over_mc.alpha = 1;
			up_mc.alpha = 0;
			disabled_mc.alpha = 0;
			down_mc.alpha = 0;	
			
		}
		
		private function outfct(evt:Event):void {

			mouseOv = false;
			if (disabled) return;
			over_mc.alpha = 0;
			up_mc.alpha = 1;
			disabled_mc.alpha = 0;
			down_mc.alpha = 0;	
		}
		
		private function dwnfct(evt:Event):void {
			if (disabled) return;
			over_mc.alpha = 0;
			up_mc.alpha = 0;	
			disabled_mc.alpha = 0;
			down_mc.alpha = 1;	
			this.dispatchEvent(new Event("passOnKey",true));
		}
		
		private function upfct(evt:Event):void {
			if (down_mc.alpha >0) {
				over_mc.alpha = 0;
				up_mc.alpha = 1;	
				disabled_mc.alpha = 0;
				down_mc.alpha = 0;	
			}
			if (mouseOv) overfct(new Event(""));
		}
		
	}
	
}
