package devarai.games.vocabularyPuzzle.tools {
	import devarai.games.vocabularyPuzzle.VocabularyPuzzle;
	import devarai.games.vocabularyPuzzle.tools.BulbWrapper;
	
	import fl.transitions.Tween;
	import fl.transitions.easing.None;
	
	import flash.display.MovieClip;
	import flash.display.Sprite;
	import flash.events.Event;
	
	
	public class ToolPanel extends MovieClip {
		
		
		/**
		 * The stopWatch
		 */
		private var watch:StopWatchWrapper;
		
		
		
		/**
		 * @return The stopwatch.
		 */
		public function get timer():StopWatchWrapper {
			return this.watch;
		}
		
		/**
		 * Makes sure everything has its right place.
		 */
		private function positioner(evt:Event):void {
			
			watch.x = -watch.width+1;
			
		}
		
		/**
		 * enables/disables the tool panel.
		 */
		private var _enabled:Boolean = true;
		private var _tw:Tween;
		private var _tw2:Tween;
		
		
		public function set enable(v:Boolean):void {
			this._enabled = v;
			
			if (_tw) _tw.stop();
			
			var target:Number = 0;
			if (v) {
				target = 1;
				this.watch.visible = true;
				

				
			}
			_tw = new Tween(this.watch,"alpha",None.easeIn,watch.alpha,target,0.8,true);
			_tw.addEventListener("motionFinish",simFinish);
			
			
		}
		
		private function simFinish(evt:Event):void {
			if (this.watch.alpha==0) {
				this.watch.visible = false;
			}
		}
		
		
		public function get enable():Boolean {
			return this._enabled;
		}
		
		/**
		 * Link to the main class
		 */
		private var sc:VocabularyPuzzle;
		
		/**
		 * Constructor.
		 */		
		public function ToolPanel(_sc:VocabularyPuzzle) {
			this.sc = _sc;

			watch = new StopWatchWrapper();
			this.addChild(watch);
			
			watch.addEventListener("countDownEnd", endGame);
			watch.addEventListener("end", endGame);
			
			
					
			
			positioner(null);
			
			this.addEventListener(Event.ENTER_FRAME, positioner);
		}
		
		
		public function reinit():void {
			this.mouseChildren = true;
			this.enable = true;
			
		}
		
		
		
		/**
		 * Triggered if we are finished.
		 */
		private function endGame(evt:Event):void {
			this.dispatchEvent(new Event("done"));
		}
	
		
		
		
	}
	
	
}