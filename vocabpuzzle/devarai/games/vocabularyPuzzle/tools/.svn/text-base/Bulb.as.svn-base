package devarai.games.vocabularyPuzzle.tools {
	
	import fl.transitions.Tween;
	
	import flash.display.MovieClip;
	import flash.events.MouseEvent;
	import fl.transitions.Tween;
	import fl.transitions.easing.None;
	
	/**
	 * This class is mapped to library symbols. It represents the light bulb.
	 */
	public class Bulb extends MovieClip {
		
		
		/**
		 * The mapped symbols
		 */
		private var on_mc:MovieClip;
		private var off_mc:MovieClip;
		
		
		/**
		 * Constructor.
		 */
		public function Bulb() {
			
			this.buttonMode = true;
			this.mouseChildren = false;
			on_mc = this.getChildByName("onClip") as MovieClip;
			off_mc = this.getChildByName("offClip") as MovieClip;
			
			on_mc.alpha = 0;			
			
			this.addEventListener(MouseEvent.MOUSE_OVER, over);
			this.addEventListener(MouseEvent.MOUSE_OUT, out);
		}
		
		private var tw:Tween = null;
		
		/**
		 * Mouse over
		 */
		private function over(evt:MouseEvent):void {
			
			if (tw) tw.stop();
			
			tw = new Tween(on_mc,"alpha",None.easeIn,on_mc.alpha,1,0.2,true);
		}

		/**
		 * Mouse out
		 */
		private function out(evt:MouseEvent):void {
			
			if (tw) tw.stop();
			
			tw = new Tween(on_mc,"alpha",None.easeIn,on_mc.alpha,0,0.2,true);
		}

	}
	
}