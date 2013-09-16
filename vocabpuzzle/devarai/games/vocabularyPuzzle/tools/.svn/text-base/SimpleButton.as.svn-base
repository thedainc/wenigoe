package devarai.games.vocabularyPuzzle.tools {
	import fl.transitions.Tween;
	import fl.transitions.easing.None;
	
	import flash.display.MovieClip;
	import flash.display.Sprite;
	import flash.events.Event;
	import flash.events.MouseEvent;
	
	/**
	 * This is a basic button class. Reacts to mouse clicks and fades in and out.
	 */
	public class SimpleButton extends MovieClip {
		
		
		protected var toAlpha:Number = 0.4;
		
		/**
		 * Constructor
		 */
		public function SimpleButton() {
			addEventListener(MouseEvent.CLICK, clicked);
			addEventListener(MouseEvent.MOUSE_OVER, over);
			addEventListener(MouseEvent.MOUSE_OUT, out);
			this.alpha = toAlpha;
			buttonMode = true;
			focusRect = false;

		}
		
		private function over(evt:Event):void {
			if (tw) tw.stop();
			tw = new Tween(this,"alpha",None.easeIn,this.alpha,1,0.2,true);
		}
		private function out(evt:Event):void {
			if (tw) tw.stop();
			tw = new Tween(this,"alpha",None.easeIn,this.alpha,toAlpha,0.2,true);
		}
		
		/**
		 * tween for fading the button
		 */
		private var tw:Tween = null;
		
		private function clicked(evt:Event):void {
			this.dispatchEvent(new Event("interaction"));
		}

		
		
	}
	
	
}