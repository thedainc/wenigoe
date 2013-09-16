package devarai.games.vocabularyPuzzle.results {
	import fl.transitions.Tween;
	import fl.transitions.easing.None;
	
	import flash.display.MovieClip;
	import flash.display.Sprite;
	import flash.events.Event;
	import flash.events.MouseEvent;
	import flash.filters.DropShadowFilter;
	import flash.filters.GlowFilter;
	/**
	 * This is a basic button class. Reacts to mouse clicks and fades in and out.
	 */
	public class ResultButton extends MovieClip {
		
		private var _glow:GlowFilter = new GlowFilter(0,0,3,3,5,3);
		
		private var _deactivated:Boolean = false;
		
		private var _drop:DropShadowFilter = new DropShadowFilter(0,0,0,0.45,2,1,2,3);
		
		/**
		 * @private
		 */
		public var dummy:Number = 0;
		
		private var isDrop:Boolean;
		
		/**
		 * Constructor
		 */
		public function ResultButton(_isDrop:Boolean = true) {
			this.isDrop = _isDrop;
			this.mouseChildren = false;
			addEventListener(MouseEvent.CLICK, clicked);
			alpha = 1;
			addEventListener(MouseEvent.MOUSE_OVER, over);
			addEventListener(MouseEvent.MOUSE_OUT, out);
			if (isDrop) {
				this.filters = [_drop,_glow];
				_drop.alpha = 0;
			}
			else this.filters = [_glow];
			buttonMode = true;
			focusRect = false;
			
		}
		
		/**
		 * Fader for deactivating
		 */
		private var detw:Tween;
		
		private var isOver:Boolean;
		
		/**
		 * Deactivates the button.
		 */
		public function deactivate():void {
			//if (this._deactivated) return;
			out(null);
			this._deactivated = true;
			if (detw) detw.stop();
			this.buttonMode = false;
			detw = new Tween(this,"alpha",None.easeIn,this.alpha,0.37,0.3,true);
		}
		
		/**
		 * activates the button.
		 */
		public function activate():void {
			//if (!this._deactivated) return;
			this._deactivated = false;
			if (this.isOver) over(null);
			this.buttonMode = true;
			if (detw) detw.stop();	
			detw = new Tween(this,"alpha",None.easeIn,this.alpha,1,0.3,true);
		}
		
		
		private function over(evt:Event):void {
			isOver = true;
			if (this._deactivated) return;
			
			if (tw) tw.stop();
			tw = new Tween(this,"dummy",None.easeIn,this.dummy,0.9,0.2,true);
			tw.addEventListener("motionChange",adapt);
		}
		private function out(evt:Event):void {
			if (evt) isOver = false;
			if (tw) tw.stop();
			tw = new Tween(this,"dummy",None.easeIn,this.dummy,0.0,0.2,true);
			tw.addEventListener("motionChange",adapt);
		}
		
		private function adapt(evt:Event):void {
			_glow.alpha = dummy;
			if (isDrop) {
				this.filters = [_drop,_glow];				
			} else {
				this.filters = [_glow];
			}
			
		}
		
		/**
		 * tween for fading the button
		 */
		private var tw:Tween = null;
		
		private function clicked(evt:Event):void {
			if (this._deactivated) return;
			this.dispatchEvent(new Event("interaction"));
		}
		
		/**
		 * Hides the button and makes it unaccessible.
		 */
		public function hide():void {
			if (detw) detw.stop();	
			detw = new Tween(this,"alpha",None.easeIn,this.alpha,0,0.3,true);
			detw.addEventListener("motionFinish",invis);
		}
		
		private function invis(evt:Event):void {
			this.visible = false;
		}
	}
	
	
}