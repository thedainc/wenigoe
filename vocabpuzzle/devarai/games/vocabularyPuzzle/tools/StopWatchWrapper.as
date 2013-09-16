package devarai.games.vocabularyPuzzle.tools {
	import devarai.games.vocabularyPuzzle.tools.CrossButton;
	import devarai.games.vocabularyPuzzle.tools.StopWatch;
	
	import fl.transitions.Tween;
	import fl.transitions.easing.None;
	import fl.transitions.easing.Regular;
	import fl.transitions.easing.Strong;
	
	import flash.display.MovieClip;
	import flash.events.Event;
	import flash.events.MouseEvent;
	import flash.events.TimerEvent;
	import flash.text.TextField;
	import flash.text.TextFormat;
	import flash.utils.Timer;

	/**
	 * This is the timer handler useful for handling the exam mode.
	 */
	public class StopWatchWrapper extends MovieClip {
		
		private var time_txt:TextField = new TextField();
		private var format:TextFormat = new TextFormat("Arial",15,0x000000,null,null,null,null,null,"left");
		private var stopWatch:StopWatch = new StopWatch();
		private var timer:Timer;
		private var _time:Number;
		private var _countDownTime:Number = 0;
		private var cross:CrossButton = new CrossButton();
		
		private var twTimer:Tween; 
		public var tweenDummy:Number;
		
		private function renewTween(evt:Event):void {
			
			if (twTimer) twTimer.stop();
			twTimer = new Tween(this,"tweenDummy",None.easeIn,tweenDummy,tweenDummy+120,120,true);
			twTimer.addEventListener("motionFinish", this.renewTween);
			
		}
		
		/**
		 * Constructor.
		 */
		public function StopWatchWrapper() {
			time_txt.embedFonts = true;
			time_txt.selectable = false;
			time_txt.mouseEnabled = false;
			this.addChild(stopWatch);
			this.addChild(time_txt);
			
			
			time_txt.x = stopWatch.width-8;
			time_txt.y = -1;
			timer = new Timer(1000,0);
			stopWatch.y = 8;
			time_txt.width = 68;
			time_txt.height = 22;
			
			stopWatch.buttonMode = true;
			stopWatch.addEventListener(MouseEvent.CLICK, showHideText);
			stopWatch.addEventListener(MouseEvent.MOUSE_OVER, overOutText);
			stopWatch.addEventListener(MouseEvent.MOUSE_OUT, overOutText);
		
			this.addChild(cross);
			cross.x = -stopWatch.width/2-8;
			cross.y = -8;
			
						
			cross.addEventListener(MouseEvent.MOUSE_OVER, finish);
			cross.addEventListener(MouseEvent.MOUSE_OUT, finish);

			cross.addEventListener("interaction", endit);
			
			
			myWidth = 10+stopWatch.width/2+time_txt.width;
			
		}	
		
		/**
		 * @private
		 */
		public var myWidth:Number;
		
		private var tw:Tween = null;
		private var htw:Tween = null;
		
		private var textShows:Boolean = true;

		private function endit(evt:Event):void {
			this.dispatchEvent(new Event("end"));
		}
		
		/**
		 * Shows a hint for ending the game button.
		 */
		private function finish(evt:MouseEvent):void {
			if (evt.type == MouseEvent.MOUSE_OVER) {
				this.message =  "End Play";
			} else {
				this.message = "";
			}			
		}
		
		/**
		 * Shows a hint for minimizing the watch tool. 
		 */
		private function overOutText(evt:MouseEvent):void {
			
			if (evt.type == MouseEvent.MOUSE_OVER) {
				this.message =  "Minimize";
			} else {
				this.message = "";
			}
			
		}
		
		/**
		 * Eventually minimizes the watch tool.
		 */
		private function showHideText(evt:Event):void {
			if (tw) tw.stop();
			if (htw) htw.stop();
			
			if (textShows) {
				textShows = false;
				htw = new Tween(time_txt,"alpha",None.easeIn,time_txt.alpha,0,0.3,true);
				tw = new Tween(this,"myWidth", Regular.easeIn,myWidth,stopWatch.width/2+10,0.3,true); 
			} else {
				textShows = true;
				htw = new Tween(time_txt,"alpha",None.easeIn,time_txt.alpha,1,0.4,true);
				tw = new Tween(this,"myWidth", Regular.easeOut,myWidth,stopWatch.width/2+10+time_txt.width,0.3,true); 				
			}
			
						
		}
		
		/**
		 * Width
		 */
		override public function get width():Number {
			return myWidth;
		}
		
		private var _message:String = "";
		
		/**
		 * Replaces eventually the time with a short message
		 */
		public function set message(s:String):void {
			_message = s;
			this.outputTime();
		}
		
		/**
		 * This function is called if we have a countdown and it is finished.
		 * 
		 */
		private function countDownFinished(evt:Event):void {
			this.dispatchEvent(new Event("countDownEnd"));
		}
		
		public function preInitTimer(countDown:Number = 0):void {
			if (timer) timer.stop();
			timer = new Timer(1000,0);
			stopWatch.reset();
			if (countDown==0) {
				_time = 0;
				timer.addEventListener(TimerEvent.TIMER, regularFct);
				this._countDownTime = 0;
				
			} else {
				
				_time = countDown;
				this._countDownTime = countDown;
				timer.addEventListener(TimerEvent.TIMER, countDownFct);
				//stopWatch.start(countDown);
			}
			outputTime();			
		}
		
		/**
		 * 
		 * Start the exam timer. If the time is limited / a countdown is desired you have to set the limit in seconds.
		 * @param countDown Limit of a countdown in seconds. "0" if no countdown.
		 */
		public function startTimer(countDown:Number = 0):void {
			if (timer) timer.stop();
			timer = new Timer(1000,0);
			stopWatch.reset();
			this.tweenDummy = 0;
			if (countDown==0) {
				_time = 0;
				timer.addEventListener(TimerEvent.TIMER, regularFct);
				this._countDownTime = 0;
				
			} else {
				
				_time = countDown;
				this._countDownTime = countDown;
				timer.addEventListener(TimerEvent.TIMER, countDownFct);
				stopWatch.start(countDown);
			}
			
			twTimer = new Tween(this,"tweenDummy",None.easeIn,tweenDummy,tweenDummy+120,120,true);
			twTimer.addEventListener("motionFinish", this.renewTween);

			timer.start();
			outputTime();
		}
		
		/**
		 * Stops the timer.
		 */
		public function stopTimer():void {
			this.twTimer.stop();
			timer.stop();
			stopWatch.pause();
		}
		
		/**
		 * Continues the timer.
		 */
		public function continueTimer():void {
			timer.start();
			stopWatch.further();
			this.twTimer.start();
		}
		
		private function regularFct(evt:Event):void {
			
			
			_time = this.tweenDummy;
			outputTime();
			
		}
		
		private function countDownFct(evt:Event):void {
			
			
			
			
			_time = this._countDownTime - this.tweenDummy;
			outputTime();
			if (_time<=0) {
				timer.stop();	
				this.countDownFinished(null);
			}
		}
		
		/**
		 * Gives you the time the user tries to solve the puzzle so far. 
		 * 
		 */
		public function get time():Number {
			if (this._countDownTime>0) {
				return this.tweenDummy;
			} else {
				return this._countDownTime - this.tweenDummy;
			}
		}
		
		/**
		 * Gives the original unchanged time at a special state.
		 */
		public function get originalTime():Number {
			return _time;
		}
		
		/**
		 * Sets the origninal time
		 */
		public function set originalTime(t:Number):void {
			_time = t;
			stopWatch.timer = t;
			outputTime();
		}
		
		/**
		 * Outputs the present user time 
		 */
		private function outputTime():void {
			
			if (this._message != "") {
				time_txt.text = this._message;
			} else {
				var hrs:int = int(_time/3600);
				var mins:int = int((_time/60)%60);
				var secs:int = int(_time%60);
				var tenths:int = Math.floor((_time*10)%10);
				
				if (tenths<0) tenths = 0;
				
				var minString:String = ""+mins;
				if (mins<10) minString = "0"+minString;
				var secString:String = ""+secs;
				if (secs<10) secString = "0"+secString;
				
				time_txt.text = ""+hrs+":"+minString+":"+secString;
			}
			
			time_txt.setTextFormat(format);

		}
		
	}
	
	
}