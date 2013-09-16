package devarai.games.vocabularyPuzzle.results {
	import devarai.common.encryption.MD5;
	import devarai.games.vocabularyPuzzle.VocabularyPuzzle;
	import devarai.games.vocabularyPuzzle.helpers.GameTable;
	
	import fl.transitions.Tween;
	import fl.transitions.easing.None;
	
	import flash.display.MovieClip;
	import flash.events.Event;
	import flash.events.IOErrorEvent;
	import flash.events.SecurityErrorEvent;
	import flash.events.TextEvent;
	import flash.events.TimerEvent;
	import flash.net.URLLoader;
	import flash.net.URLLoaderDataFormat;
	import flash.net.URLRequest;
	import flash.net.URLRequestMethod;
	import flash.net.URLVariables;
	import flash.text.TextFieldType;
	import flash.text.TextFormat;
	import flash.utils.Timer;
	
	/**
	 * This class is linked to a library symbol. It displays after the game a dialog window
	 * with the results and eventually allows to transfer them to the backend for database storage.
	 */
	public class ResultsDialog extends MovieClip {
		
		/**
		 * Link back to the main class.
		 */
		private var _sp:VocabularyPuzzle;
		private var _format:TextFormat = new TextFormat("_sans",14,0xaa0000);
		
		private var timer:Timer;

		/**
		 * Says whether we have sent the results to the backend
		 */
		private var sentState:Boolean = false;
		
		
		/**
		 * Valdiates the provided email
		 */
		private function validate(s:String):Boolean {

			var myRegExp:RegExp = /^[a-z][\w.-]+@\w[\w.-]+\.[\w.-]*[a-z][a-z]$/i;
			
			return myRegExp.test(s);
			
		}

		/**
		 * Checks the input and validates the email. If incorrect email set input color red
		 */
		private function checkInput(evt:Event):void {
			
			if (!validate(emailLine_mc.input_txt.text)) {
				_format.color = 0xbb0000;
				emailLine_mc.input_txt.setTextFormat(_format);
				emailLine_mc.input_txt.defaultTextFormat = _format;
				submit_mc.deactivate();
			} else {
				_format.color = 0x000000;
				emailLine_mc.input_txt.setTextFormat(_format);				
				emailLine_mc.input_txt.defaultTextFormat = _format;
				submit_mc.activate();
				playagain_mc.activate();
			}
			
		
		}
		
		/**
		 * Constructor.
		 * @param sp Link to the main class.
		 * 
		 */
		public function ResultsDialog(sp:VocabularyPuzzle) {
			this.addEventListener(Event.ADDED_TO_STAGE, showme);
			this.addEventListener(Event.REMOVED_FROM_STAGE, hideme);
			this.alpha = 0;
			this._sp = sp;


			
			if (!_sp.submitResults) {
				emailLine_mc.visible = false;
				submit_mc.visible = false;
				playagain_mc.x = -52;
				timer = new Timer(1100,1);
				noemail_txt.visible = true;
			} else {
				playagain_mc.x = -35;
				timer = new Timer(1100);
				timer.addEventListener(TimerEvent.TIMER,checkInput);
				noemail_txt.visible = false;
				submit_mc.addEventListener("interaction", submitData);
				//playagain_mc.deactivate();

			}
			playagain_mc.addEventListener("interaction", replay);
			
		}
		
		/**
		 * Stop timer if removed from stage
		 */
		private function hideme(evt:Event):void {
			timer.stop();
		}

		
		private var md5:MD5 = new MD5();

		/**
		 * Submits the player's game data
		 */
		private function submitData(evt:Event):void {
			
			//submitted(null);
			//return;
			
			trace("Sending results");
			var t:String = GameTable.tt+emailLine_mc.input_txt.text;
			
			var ti:String = md5.encrypt(t);
			
			var co:String = GameTable.tt+"MD"+ti;
			
			if(sentState == false) {
				var res:Array = _sp.searchTable.statistics();
				var myLoader:URLLoader = new URLLoader();
				myLoader.dataFormat = URLLoaderDataFormat.VARIABLES;
				var myDate:Date = new Date();
				var timestamp:uint = myDate.getTime();
				var myVars:URLVariables = new URLVariables();
				myVars.email = emailLine_mc.input_txt.text;
				myVars.score = ""+score;
				myVars.timePlayed = ""+(_sp.myTools.timer.time);
				myVars.word = ""+_sp.theWord;
				myVars.code = co;
				myVars.time = GameTable.time;
				myVars.theID = ""+_sp.id;
				var myRequest:URLRequest = new URLRequest(_sp.phpPath+"writeResults.php?"+timestamp);
				myRequest.method = URLRequestMethod.POST; 
				myRequest.data = myVars;
				myLoader.load(myRequest);
				myLoader.addEventListener(Event.COMPLETE,submitted);
				myLoader.addEventListener(SecurityErrorEvent.SECURITY_ERROR,securityErrorHandler);
				myLoader.addEventListener(IOErrorEvent.IO_ERROR,ioErrorHandler);
			} else {
			}

		}
		
		
		private function securityErrorHandler(e:SecurityErrorEvent):void {
		}
		private function ioErrorHandler(e:IOErrorEvent):void {
		}
		
		/**
		 * 
		 * This method is called when the submission to the backend took place.
		 * 
		 */
		private function submitted(e:Event):void {
			submit_mc.deactivate();
			timer.stop();
			
			subInfo_txt.alpha = 0.9;
			
			emailLine_mc.input_txt.type  = TextFieldType.DYNAMIC;
			emailLine_mc.input_txt.selectable = false;
			emailLine_mc.input_txt.mouseEnabled = false;
			emailLine_mc.input_txt.alpha = 0.35;
			sentState = true;
		}

		
		/**
		 * Closes the dialog
		 */
		public function close():void {
			if (tw) tw.stop();
			tw = new Tween(this,"alpha",None.easeIn,this.alpha,0,0.4,true);
			tw.addEventListener("motionFinish", remove);
		}
		
		/**
		 * Method triggered if replay button is hit.
		 */
		private function replay(evt:Event):void {
			if (tw) tw.stop();
			tw = new Tween(this,"alpha",None.easeIn,this.alpha,0,0.4,true);
			tw.addEventListener("motionFinish", diReplay);
		}
		private function diReplay(evt:Event):void {
			this._sp.restartGame();
		}
		
		private function remove(evt:Event):void {
			this.parent.removeChild(this);
		}
		
		/**
		 * Tween for fading in.
		 */
		private var tw:Tween = null;
		
		/**
		 * The player's score
		 */
		private var score:Number;
		
		/**
		 * Fades in the dialog window
		 */
		private function showme(evt:Event):void {
			this.sentState = false;
			
			if (tw) tw.stop();
			tw = new Tween(this,"alpha",None.easeIn,this.alpha,1,1.0,true);
			
			var time:Number = _sp.myTools.timer.time;
			
			var mins:int = time/60;
			var secs:int = time%60;
			var tens:int = Math.floor(time*10)%10 
			
			var minsS:String = "minute";
			if (mins!=1) minsS = minsS+"s";
			var secsS:String = "second";
			if (secs!=1) secsS = secsS+"s";
			
		
			var res:Array = _sp.searchTable.statistics();
			
			score = res[0]; //Math.round(5111111*res[0]/(1*(_sp.timeWeight*time+60*10)));
			
			
			time_txt.text = ""+mins+" "+minsS+" and "+secs+" "+secsS;
			
			
			
			words_txt.text = res[1]+" unique words found";
			
			score_txt.text = ""+Number(score)+" points";
			
			emailLine_mc.input_txt.selectable = true;
			emailLine_mc.input_txt.mouseEnabled = true;
			emailLine_mc.input_txt.type  = TextFieldType.INPUT;
			emailLine_mc.input_txt.alpha = 1;
			submit_mc.deactivate();
			
			subInfo_txt.alpha = 0;

			timer.start();
			
		}
		
	}
	
	
	
}