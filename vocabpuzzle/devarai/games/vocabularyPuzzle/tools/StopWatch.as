package devarai.games.vocabularyPuzzle.tools {
	
	
	import fl.transitions.Tween;
	import fl.transitions.easing.Elastic;
	import fl.transitions.easing.None;
	import fl.transitions.easing.Regular;
	import fl.transitions.easing.Strong;
	
	import flash.display.Graphics;
	import flash.display.MovieClip;
	import flash.display.Sprite;
	import flash.events.Event;
	import flash.events.MouseEvent;
	import flash.filters.BlurFilter;
	import flash.filters.DropShadowFilter;
	
	/**
	 * This is the watch / timer responsible for the exam mode 
	 * 
	 */
	public class StopWatch extends MovieClip {
		
		
		/**
		 * Tween for animation
		 */
		private var tw:Tween = null;
		/**
		 * The countdown time
		 */
		private var _time:Number = 0;
		/**
		 * @private
		 */
		public var stat:Number = 0;
		
		private var _disabled:Boolean = false;
		/**
		 * Is true if the countdown is finished.
		 */
		private var _finished:Boolean = false;
		/**
		 * Sprite for masking the red area.
		 */		
		private var maske:Sprite = new Sprite();
		
		
		/**
		 * Constructor
		 */
		public function StopWatch() {
			
			this.scaleX = 0.35;
			this.scaleY = 0.35;
			
			var filt:DropShadowFilter = new DropShadowFilter(2,115,0x000000,0.8,5,5,0.9,3);
			
			this.filters = [filt];
			this.addChild(maske);
			maske.y = stoppuhrRed_mc.y;
			maske.x = stoppuhrRed_mc.x;
			stoppuhrRed_mc.mask = maske;
			
			
		}
		
		
		public function get isFinished():Boolean {
			if (_disabled) return false;
			return _finished;
		}
		
		
		/**
		 * Disables the watch
		 */
		public function set disabled(v:Boolean):void {
			
			if (_disabled && !v) {
				drawMask(0);
				this.visible = true;
				_finished = true;
			} else if (v) this.visible = false;
			
			_disabled = v;
		}
		
		/**
		 * Resets the mask
		 */
		public function reset():void {
			if (tw)	tw.stop();
			tw = null;
			this.stat = 0;
			drawMask(0);
			_finished = true;			
		}
		
		/**
		 * 
		 * Start a countdown
		 */
		public function start(time:Number):void { // in Seconds
			
			if (_disabled) return;
			this.stat = 0;
			if (tw) tw.stop();
			_time = time; 
			_finished = false;
			tw = new Tween(this,"stat",None.easeIn,0,360,time,true);
			tw.addEventListener("motionChange",maskeAnpassen);
			tw.addEventListener("motionFinish",finished);
			
		}
		
		/**
		 * 
		 * Dispatches an event if the countdown is finished
		 */
		private function finished(evt:Event):void {
			if (_disabled) return;
			this.dispatchEvent(new Event("countDownEnd"));
			_finished = true;
		}
		
		/**
		 * Middle out time set
		 */
		public function set timer(_t:Number):void {
			if (this._finished) return;
			var t:Number = _time-_t;
			if (tw) tw.stop();
			tw = new Tween(this,"stat",None.easeIn,360*t/_time,360,(_time-t),true);
			tw.addEventListener("motionChange",maskeAnpassen);
			tw.addEventListener("motionFinish",finished);
			maskeAnpassen(null);
			
		}
		
		/**
		 * 
		 * Returns the actual countdown time
		 */
		public function get time():Number {
			return (stat/360)*_time;
		}

		/**
		 * Pauses the countdown.
		 */
		public function pause():void {
			if (!tw) return;
			tw.stop();
		}
		/**
		 * Continues the countdown
		 */
		public function further():void {
			if (!tw) return;
			tw.resume();
		}
		
		
		/**
		 * Adapts the mask
		 */
		private function maskeAnpassen(evt:Event) {
			drawMask(-stat);
		}
		
		
		/**
		 * Draws the mask which determines the red/white area.
		 */
		private function drawMask(degrees:Number):void {
			
			var _arc:Number = degrees;
			var _startAngle : Number = 90;
			var radius = stoppuhrRed_mc.width /2;
			
			
			var grafik1:Graphics;	
			
			grafik1 = maske.graphics;
			grafik1.clear();
			grafik1.beginFill(0x000000,1);
			
			var segAngle, theta, angle, angleMid, segs, ax, ay, bx, by, cx, cy;
			grafik1.moveTo(0, 0);
			segs = Math.ceil(Math.abs(_arc)/45);
			segAngle = _arc/segs;
			theta = -(segAngle/180)*Math.PI;
			angle = -(_startAngle/180)*Math.PI;
			if (segs>0) {
				ax = Math.cos(_startAngle/180*Math.PI)*radius;
				ay = Math.sin(-_startAngle/180*Math.PI)*radius;
				grafik1.lineTo(ax, ay);
				for (var i:int = 0; i<segs; i++) {
					angle += theta;
					angleMid = angle-(theta/2);
					bx = Math.cos(angle)*radius;
					by = Math.sin(angle)*radius;
					cx = Math.cos(angleMid)*(radius/Math.cos(theta/2));
					cy = Math.sin(angleMid)*(radius/Math.cos(theta/2));
					grafik1.curveTo(cx, cy, bx, by);
				}
				grafik1.lineTo(0, 0);
			}
		}
		
	}
	
	
	
}